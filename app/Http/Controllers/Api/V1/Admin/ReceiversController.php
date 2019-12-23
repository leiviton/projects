<?php
/**
 * Created by PhpStorm.
 * User: leviton
 * Date: 17/08/2016
 * Time: 15:26
 */

namespace ApiWebPsp\Http\Controllers\Api\V1\Admin;

use ApiWebPsp\Http\Controllers\Controller;
use ApiWebPsp\Services\ReceiverService;
use Illuminate\Http\Request;

class ReceiversController extends Controller
{

    use UtilTrait;

    /**
     * @var ReceiverService
     */
    private $service;

    /**
     * UserController constructor.
     * @param ReceiverService $service
     */
    public function __construct(ReceiverService $service)
    {
        $this->service = $service;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index()
    {
        return $this->service->getReceivers();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getCpf($cpf)
    {
        return $this->service->getCpf($cpf);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|min:4',
            'document' => 'required|unique:Receivers,document',
            'date_birth' => 'required',
            'contact.cellphone' => 'required',
            'address.postal_code' => 'required',
            'address.street' => 'required',
            'address.number' => 'required',
            'address.city' => 'required',
            'address.uf' => 'required',
            'address.type' => 'required',
        ], [
            'name.required' => 'Nome do usuário é obrigatório',
            'name.length' => 'Nome deve conter no minimo 4 caracteres',
            'document.unique' => 'Cpf/Cnpj já está em uso no sistema',
            'document.required' => 'Cpf/Cnpj é obrigatorio',
            'contact.cellphone.required' => 'Celular é obrigatório',
            'contact.email.required' => 'Bairro é obrigatório',
            'contact.email.unique' => 'Email já utilizado no sistema',
            'contact.email.email' => 'Email necessita ser um email valido',
            'address.street.required' => 'Logradouro é obrigatório',
            'address.neighborhood.required' => 'Bairro é obrigatório',
            'address.number.required' => 'Numero endereço é obrigatório',
            'address.uf.required' => 'UF endereço é obrigatório',
            'address.type.required' => 'Tipo endereço é obrigatório',
            'address.postal_code.required' => 'Cep é obrigatório'
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
        $Receiver = $this->service->getId($result['id']);

        if ($result['status'] == 'success') {
            return response()->json(['message' => 'Cadastro realizado com sucesso', 'status' => 'success', 'title' => 'Sucesso','id' => $result['id'], 'Receiver' => $Receiver], 201);
        } else if ($result['status'] == 'error') {
            return response()->json(['message' => $result['message'], 'status' => 'error', 'title' => 'Erro'], 400);
        } else {
            return response()->json(['message' => 'Erro desconhecido, contate o Good do software', 'status' => 'error', 'title' => 'Erro'], 400);
        }
    }


    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function update($id, Request $request)
    {
        //dd($request);
        $result = $this->service->update($id, $request->all());

        if ($result['status'] == 'success') {
            $Receiver = $this->service->getId($id);
            return response()->json(['message' => 'Paciente atualizado com sucesso', 'status' => 'success', 'title' => 'Sucesso','Receiver' => $Receiver], 200);
        } else if ($result['status'] == 'error') {
            return response()->json(['message' => $result['message'], 'status' => 'error', 'title' => 'Erro'], 400);
        } else {
            return response()->json(['message' => 'Erro desconhecido, contate o Good do software', 'status' => 'error', 'title' => 'Erro'], 400);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete($id) {
        $result = $this->service->delete($id);

        if ($result['status'] == 'success') {
            return response()->json(['message' => 'Paciente excluído com sucesso', 'status' => 'success', 'title' => 'Sucesso'], 200);
        } else if ($result['status'] == 'error') {
            return response()->json(['message' => $result['message'], 'status' => 'error', 'title' => 'Erro'], 400);
        } else {
            return response()->json(['message' => 'Erro desconhecido, contate o Good do software', 'status' => 'error', 'title' => 'Erro'], 400);
        }
    }
}
