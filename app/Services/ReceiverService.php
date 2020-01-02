<?php
/**
 * Created by PhpStorm.
 * User: leiviton.silva
 * Date: 17/04/2019
 * Time: 16:03
 */

namespace ApiWebPsp\Services;

use ApiWebPsp\Repositories\ReceiverRepository;
use Illuminate\Support\Facades\DB;

class ReceiverService
{
    /**
     * @var ReceiverRepository
     */
    private $repository;

    /**
     * CompanyService constructor.
     * @param ReceiverRepository $repository
     */
    public function __construct(ReceiverRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getId($id)
    {
        return $this->repository->skipPresenter(false)->find($id);
    }

    /**
     * @param $cpf
     * @return mixed
     */
    public function getCpf($cpf)
    {
        return $this->repository->skipPresenter(false)->getCpf($cpf);
    }

    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public function create($data)
    {
        DB::beginTransaction();
        try {

            $data['date_birth'] = $data['date_birth'] != '' ? $this->invertDate($data['date_birth']) : null;

            $result = $this->repository->create($data);

            $addresses = $data['address'];

            foreach ($addresses as $address)
            {
                $result->addresses()->create($address);
            }

            $contacts = $data['contact'];

            foreach ($contacts as $contact)
            {
                $result->receiver_contacts()->create($contact);
            }

            DB::commit();

            return ['status' => 'success', 'id' => $result->id];

        } catch (\Exception $exception) {
            DB::rollBack();
            return ['status' => 'error', 'message' => $exception->getMessage(), 'title' => 'Erro'];
        }
    }

    /**
     * @return mixed
     */
    public function getReceivers()
    {
        return $this->repository->skipPresenter(false)->paginate();
    }

    /**
     * @param $id
     * @param $data
     * @return array
     * @throws \Exception
     */
    public function update($id, $data)
    {
        DB::beginTransaction();
        try {
            $data['date_birth'] = $this->invertDate($data['date_birth']);

            $Receiver = $this->repository->find($id);
            $Receiver->document = $data['document'];
            $Receiver->date_birth = $data['date_birth'] == "" ? null : $data['date_birth'];
            $Receiver->name = $data['name'];
            //$result = $this->repository->update($data, $id);
            $Receiver->save();
            DB::commit();

            return ['status' => 'success', 'id' => $id];

        } catch (\Exception $exception) {
            DB::rollBack();
            return ['status' => 'error', 'message' => $exception->getMessage(), 'title' => 'Erro'];
        }
    }

    /**
     * @param $id
     * @return array
     * @throws \Exception
     */
    public function delete($id)
    {
        DB::beginTransaction();
        try {

            $result = $this->repository->delete($id);

            DB::commit();

            return ['status' => 'success', 'id' => $id];

        } catch (\Exception $exception) {
            DB::rollBack();
            return ['status' => 'error', 'message' => $exception->getMessage(), 'title' => 'Erro'];
        }
    }

    /**
     * @param $date
     * @return \DateTime
     * @throws \Exception
     */
    public function invertDate($date){
        $result = '';
        if(count(explode("/",$date)) > 1){
            $result = implode("-",array_reverse(explode("/",$date)));
            return new \DateTime($result);
        }elseif(count(explode("-",$date)) > 1){
            $result1 = implode("/",array_reverse(explode("-",$date)));
            $result = implode("-",array_reverse(explode("/",$result1)));
            return new \DateTime($result);
        }
    }
}
