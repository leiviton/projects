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

    use UtilTrait,ValidationControllerTrait;

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
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return $this->service->getId($id,false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        if ($request->get('type') == 'clinica') {
            $validate = $this->validateCnpj($request->get('document'));

            if ($validate == false) {
                return response()->json([
                    'title' => 'Erro',
                    'status' => 'error',
                    'message' => 'CNPJ precisa ser válido'
                ], 406);
            }
        } else {
            $validate = $this->validateCPF($request->get('document'));

            if ($validate == false) {
                return response()->json([
                    'title' => 'Erro',
                    'status' => 'error',
                    'message' => 'CPF precisa ser válido'
                ], 406);
            }
        }

        $validator = Validator($request->all(), [
            'name' => 'required|min:4',
            'document' => 'required|unique:receivers,document|min:11',
            'contact.*.content' => 'required|min:11',
            'contact.*.type' => 'required|min:3',
            'address.*.postal_code' => 'required|min:8',
            'address.*.street' => 'required|min:3',
            'address.*.number' => 'required|min:1',
            'address.*.city' => 'required|min:3',
            'address.*.neighborhood' => 'required|min:3',
            'address.*.uf' => 'required|min:2',
            'person.*.name' => 'required|min:2',
            'person.*.document' => 'required|min:2',
            'person.*.phone' => 'required|min:2'
        ], [
            'name.required' => 'Nome do usuário é obrigatório',
            'name.length' => 'Nome deve conter no minimo 4 caracteres',
            'document.unique' => 'Cpf/Cnpj já está em uso no sistema',
            'document.length' => 'CPF/CNPJ deve conter no minimo 4 caracteres',
            'document.required' => 'Cpf/Cnpj é obrigatorio',
            'contact.*.content.required' => 'Valor do contato é obrigatório',
            'contact.*.content.length' => 'Contato tem que ter no minimo 11 caracteres',
            'contact.*.type.length' => 'Tipo contato tem que ter no minimo 3 caracteres',
            'contact.*.type.required' => 'Tipo do contato é obrigatório',
            'address.*.street.required' => 'Logradouro é obrigatório',
            'address.*.street.length' => 'Endereço tem que no minimo 3 caracteres',
            'address.*.number.length' => 'Número do endereço tem que no minimo 1 caracteres',
            'address.*.city.length' => 'Cidade do endereço tem que no minimo 3 caracteres',
            'address.*.uf.length' => 'UF do endereço tem que no minimo 2 caracteres',
            'address.*.postal_code.length' => 'Cep do endereço tem que no minimo 8 caracteres',
            'address.*.neighborhood.length' => 'Bairro/Distrito tem que no minimo 3 caracteres',
            'address.*.neighborhood.required' => 'Bairro é obrigatório',
            'address.*.number.required' => 'Numero endereço é obrigatório',
            'address.*.city.required' => 'Cidade do endereço é obrigatória',
            'address.*.uf.required' => 'UF endereço é obrigatório',
            'address.*.postal_code.required' => 'Cep é obrigatório',
            'person.*.name.required' => 'Nome pessoa autorizada é obrigatório',
            'person.*.document.required' => 'Documento pessoa autorizada é obrigatório',
            'person.*.phone.required' => 'Telefone pessoa autorizada é obrigatório'
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
            $receiver = $this->service->getId($result['id']);
            return response()->json(['message' => 'Cadastro realizado com sucesso', 'status' => 'success', 'title' => 'Sucesso','id' => $result['id'], 'receiver' => $receiver], 201);
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

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deletePerson($id)
    {
        $result = $this->service->deletePerson($id);

        if ($result['status'] == 'success') {
            return response()->json(['message' => 'Contato autorizado excluido com sucesso', 'status' => 'success', 'title' => 'Sucesso', 'result' => $result['result']], 201);
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
    public function person($id, Request $request)
    {
        $receiver = $this->service->getId($id);

        if($this->clear($receiver->document) == $this->clear($request->document)) {
                return response()->json([
                    'title' => 'Erro',
                    'status' => 'error',
                    'message' => 'CPF não pode ser igual do receptor principal'
                ], 406);
        }

        $validator = Validator($request->all(),[
            'name' => 'required|min:4',
            'document' => 'required',
            'phone' => 'required',
        ], [
            'name.required' => 'Nome do contato é obrigatório',
            'name.length' => 'Nome deve conter no minimo 4 caracteres',
            'document.required' => 'Documento é obrigatorio',
            'phone.required' => 'Documento é obrigatorio'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'title' => 'Erro',
                'status' => 'error',
                'message' => $validator->errors()->unique()
            ], 406);
        }

        $data = $request->all();

        $result = $this->service->people($id,$data);

        if ($result['status'] == 'success') {
            return response()->json(['message' => 'Cadastro realizado com sucesso', 'status' => 'success', 'title' => 'Sucesso', 'result' => $result['result']], 201);
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
    public function address($id, Request $request)
    {
        $validator = Validator($request->all(), [
            'street' => 'required',
            'neighborhood' => 'required',
            'number' => 'required',
            'city' => 'required',
            'uf' => 'required',
            'postal_code' => 'required'
        ], [
            'street.required' => 'Logradouro é obrigatório',
            'neighborhood.required' => 'Bairro é obrigatório',
            'number.required' => 'Numero endereço é obrigatório',
            'city.required' => 'Cidade é obrigatória',
            'uf.required' => 'Estado é obrigatória',
            'postal_code.required' => 'Cep é obrigatório'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'title' => 'Erro',
                'status' => 'error',
                'message' => $validator->errors()->unique()
            ], 406);
        }

        $data = $request->all();

        $result = $this->service->address($id,$data);

        if ($result['status'] == 'success') {
            return response()->json(['message' => 'Cadastro realizado com sucesso', 'status' => 'success', 'title' => 'Sucesso', 'result' => $result['result']], 201);
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
    public function contact($id, Request $request)
    {
        $validator = Validator($request->all(), [
            'type' => 'required',
            'content' => 'required'
        ], [
            'type.required' => 'Tipo é obrigatório',
            'content.required' => 'Valor é obrigatório'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'title' => 'Erro',
                'status' => 'error',
                'message' => $validator->errors()->unique()
            ], 406);
        }

        $data = $request->all();

        $result = $this->service->contact($id,$data);

        if ($result['status'] == 'success') {
            return response()->json(['message' => 'Cadastro realizado com sucesso', 'status' => 'success', 'title' => 'Sucesso', 'result' => $result['result']], 201);
        } else if ($result['status'] == 'error') {
            return response()->json(['message' => $result['message'], 'status' => 'error', 'title' => 'Erro'], 400);
        } else {
            return response()->json(['message' => 'Erro desconhecido, contate o Good do software', 'status' => 'error', 'title' => 'Erro'], 400);
        }
    }
}
