<?php
/**
 * Created by PhpStorm.
 * User: leviton
 * Date: 17/08/2019
 * Time: 15:26
 */

namespace ApiWebPsp\Http\Controllers\Api\V1\Admin;

use ApiWebPsp\Http\Controllers\Controller;
use ApiWebPsp\Mail\RegisterBuyer;
use ApiWebPsp\Services\SolicitationService;
use ApiWebPsp\Mail\InvoiceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SolicitationsController extends Controller
{

    use UtilTrait;

    /**
     * @var SolicitationService
     */
    private $service;

    /**
     * SolicitationsController constructor.
     * @param SolicitationService $service
     */
    public function __construct(SolicitationService $service)
    {
        $this->service = $service;
    }

    /**
     * Lista chamados
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->service->getSolicitations($request->get('status'));
    }

    /**
     * Get por id
     * @return mixed
     */
    public function edit($id)
    {
        return $this->service->getId($id);
    }

    /**
     * Criar solicitação e envia email para sac novonordisk
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'voucher' => 'required|unique:solicitations,protocol',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required',
            'items.*.qtd' => 'required',
            'type' => 'required',
            'patient_id' => 'required',
        ], [
            'voucher.required' => 'Nome do usuário é obrigatório',
            'voucher.unique' => 'Protocolo já existe no sistema',
            'items.*.product_id.required' => 'Produto é obrigatório',
            'items.*.qtd.required' => 'Quantidade é obrigatória',
            'items.required' => 'É necessário selecionar ao menos um produto',
            'items.length' => 'É necessário selecionar ao menos um produto',
            'type.required' => 'Tipo é obrigatório',
            'patient_id.required' => 'Paciente é obrigatório',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'title' => 'Erro',
                'status' => 'error',
                'message' => $validator->errors()->unique()
            ], 406);
        }


        $data = $request->all();

        $result = $this->service->create($data);

        //dd($result);
        if ($result['status'] == 'success') {
            $solicitation = $this->service->getSolicitation($result['id']);

            Mail::to(['cs.novonordisk@drsgroup.com.br', 'leiviton.silva@drsgroup.com.br', 'michel.santos@drsgroup.com.br', 'caio.moraes@drsgroup.com.br','raquel.mota@drsgroup.com.br'])
                ->queue(new InvoiceOrder('allan.santos@drsgroup.com.br', $solicitation));

            return response()->json(['message' => 'Chamado incluído com sucesso', 'status' => 'success', 'title' => 'Sucesso'], 201);
        } else if ($result['status'] == 'error') {
            return response()->json(['message' => $result['message'], 'status' => 'error', 'title' => 'Erro'], 400);
        } else {
            return response()->json(['message' => 'Erro desconhecido, contate o Good do software', 'status' => 'error', 'title' => 'Erro'], 400);
        }
    }


    /**
     * update em construção
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function update($id, Request $request)
    {
        $result = $this->service->update($id, $request->all());

        if ($result['status'] == 'success') {
            return response()->json(['message' => 'Usuario atualizado com sucesso', 'status' => 'success', 'title' => 'Sucesso'], 200);
        } else if ($result['status'] == 'error') {
            return response()->json(['message' => $result['message'], 'status' => 'error', 'title' => 'Erro'], 400);
        } else {
            return response()->json(['message' => 'Erro desconhecido comunique o administrador do sistema', 'status' => 'error', 'title' => 'Erro'], 400);
        }
    }

    /**
     * Delte logico
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete($id)
    {
        $result = $this->service->delete($id);

        if ($result['status'] == 'success') {
            return response()->json(['message' => 'Usuario excluido com sucesso', 'status' => 'success', 'title' => 'Sucesso'], 200);
        } else if ($result['status'] == 'error') {
            return response()->json(['message' => $result['message'], 'status' => 'error', 'title' => 'Erro'], 400);
        } else {
            return response()->json(['message' => 'Erro desconhecido comunique o administrador do sistema', 'status' => 'error', 'title' => 'Erro'], 400);
        }
    }

    /**
     * Criar agendamento caso nao tenha agendamento ativo
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function scheduleSolicitation(Request $request)
    {
        $validator = Validator($request->all(), [
            'solicitation_id' => 'required',
            'date_scheduling' => 'required',
            'user_create' => 'required',
            'period' => 'required'
        ], [
            'solicitation_id.required' => 'Codigo da solicitação é obrigatório',
            'user_create.required' => 'Endereço é obrigatório',
            'period.required' => 'Manifestação é obrigatória',
            'date_scheduling.required' => 'Data de agendamento é obrigatória'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'title' => 'Erro',
                'status' => 'error',
                'message' => $validator->errors()->unique()
            ], 406);
        }

        $feriados = $this->diasFeriados();

        $isFeriado = false;

        for($i = 0; $i < count($feriados);$i++)
        {
            if ($request->get('date_scheduling') == $feriados[$i])
            {
                $isFeriado = true;
                break;
            }
        }

        if ($isFeriado == true) {
            return response()->json([
                'title' => 'Erro',
                'status' => 'error',
                'message' => 'Data de agendamento não pode ser um feriado'
            ], 406);
        }

        $data = $request->all();

        $result = $this->service->scheduling($data);

        if ($result['status'] == 'success') {

            $solicitation = $this->service->getSolicitation($result['id']);

            Mail::to(
                [
                    'cs.novonordisk@drsgroup.com.br',
                    'leiviton.silva@drsgroup.com.br',
                    'michel.santos@drsgroup.com.br',
                    'caio.moraes@drsgroup.com.br'
                ])
                ->queue(new RegisterBuyer(
                    $solicitation->patient->patient_contacts[0]->email,
                    $solicitation,
                    $result['scheduling']));
            return response()->json(
                [
                    'message' => 'Agendamento realizado com sucesso',
                    'status' => 'success',
                    'title' => 'Sucesso'
                ], 200);
        } else if ($result['status'] == 'error') {
            return response()->json(['message' => $result['message'], 'status' => 'error', 'title' => 'Erro'], 400);
        } else {
            return response()->json(
                [
                    'message' => 'Erro desconhecido, contate o Good do software',
                    'status' => 'error',
                    'title' => 'Erro'
                ], 400);
        }
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->service->assignAnalyst();
    }

    /**
     * retorna os contadores do dash
     * @return mixed
     */
    public function counts()
    {
        $result = $this->service->countStatus();
        // dd($result->qtd);
        return $result;
    }

    /**
     * Iniciar atendimento
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function initSolicitation($id)
    {
        $result = $this->service->initSolicitation($id);

        if ($result['status'] == 'success') {
            return response()->json(['message' => 'Chamado iniciado com sucesso', 'status' => 'success', 'title' => 'Sucesso'], 200);
        } else if ($result['status'] == 'error') {
            return response()->json(['message' => $result['message'], 'status' => 'error', 'title' => 'Erro'], 400);
        } else {
            return response()->json(['message' => 'Erro desconhecido, contate o Good do software', 'status' => 'error', 'title' => 'Erro'], 400);
        }
    }

    /**
     * Cancelar agendamento
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function canceledSchedule($id)
    {
        $result = $this->service->canledScheduling($id);

        if ($result['status'] == 'success') {
            return response()->json(['message' => 'Agendamento cancelado com sucesso', 'status' => 'success', 'title' => 'Sucesso'], 200);
        } else if ($result['status'] == 'error') {
            return response()->json(['message' => $result['message'], 'status' => 'error', 'title' => 'Erro'], 400);
        } else {
            return response()->json(['message' => 'Erro desconhecido, contate o Good do software', 'status' => 'error', 'title' => 'Erro'], 400);
        }
    }

    /**
     * Mudar endereço na solicitação
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function updateAddress($id, Request $request)
    {
        $result = $this->service->updateAddress($id, $request->all());

        if ($result['status'] == 'success') {
            $solicitation = $this->service->getId($result["id"]);
            return response()->json(['message' => 'Endereço atualizado com sucesso', 'status' => 'success', 'title' => 'Sucesso', 'data' => $solicitation["data"]], 200);
        } else if ($result['status'] == 'error') {
            return response()->json(['message' => $result['message'], 'status' => 'error', 'title' => 'Erro'], 400);
        } else {
            return response()->json(['message' => 'Erro desconhecido, contate o Good do software', 'status' => 'error', 'title' => 'Erro'], 400);
        }
    }

    /**
     * Criar agendamento caso nao tenha agendamento ativo
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function schedulingAttempt(Request $request)
    {
        $validator = Validator($request->all(), [
            'user_id' => 'required',
            'solicitation_id' => 'required',
            'phone' => 'required',
            'sms' => 'required'
        ], [
            'user_id.required' => 'Codigo da usuario é obrigatório',
            'solicitation_id.required' => 'Codigo solicitação é obrigatório',
            'sms.required' => 'SMS é obrigatório',
            'phone.required' => 'Telefone é obrigatório'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'title' => 'Erro',
                'status' => 'error',
                'message' => $validator->errors()->unique()
            ], 406);
        }

        $data = $request->all();

        $data['user'] = $data['user_id'];

        $result = $this->service->attempt($data);

        if ($result['status'] == 'success') {
            return response()->json(
                [
                    'message' => 'Tentativa salva com sucesso',
                    'status' => 'success',
                    'title' => 'Sucesso'
                ], 200);
        } else if ($result['status'] == 'error') {
            return response()->json(['message' => $result['message'], 'status' => 'error', 'title' => 'Erro'], 400);
        } else {
            return response()->json(
                [
                    'message' => 'Erro desconhecido, contate o Good do software',
                    'status' => 'error',
                    'title' => 'Erro'
                ], 400);
        }
    }


    /**
     * @return array
     * @throws \Exception
     */
    public function countMounth()
    {
        return $this->service->countMounth();
    }

    public function countNow()
    {
        return $this->service->countNow();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function updateAttendant(Request $request)
    {
        $idSolicitation = $request->get('solicitation_id');

        $idUser = $request->get('user_id');

        $result = $this->service->updateAttendant($idSolicitation, $idUser);

        if ($result['status'] == 'success') {
            return response()->json(['message' => 'Chamado atribuido com sucesso', 'status' => 'success', 'title' => 'Sucesso'], 200);
        } else if ($result['status'] == 'error') {
            return response()->json(['message' => $result['message'], 'status' => 'error', 'title' => 'Erro'], 400);
        } else {
            return response()->json(['message' => 'Erro desconhecido comunique o administrador do sistema', 'status' => 'error', 'title' => 'Erro'], 400);
        }
    }
}
