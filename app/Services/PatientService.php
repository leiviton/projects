<?php
/**
 * Created by PhpStorm.
 * User: leiviton.silva
 * Date: 17/04/2019
 * Time: 16:03
 */

namespace ApiWebPsp\Services;

use ApiWebPsp\Repositories\AddressRepository;
use ApiWebPsp\Repositories\PatientContactRepository;
use ApiWebPsp\Repositories\PatientRepository;
use Faker\Provider\DateTime;
use Illuminate\Support\Facades\DB;

class PatientService
{
    /**
     * @var PatientRepository
     */
    private $repository;

    /**
     * CompanyService constructor.
     * @param PatientRepository $repository
     * @param AddressRepository $addressRepository
     * @param PatientContactRepository $contactRepository
     */
    public function __construct(PatientRepository $repository)
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

            $data['date_birth'] = $this->invertDate($data['date_birth']);

            $result = $this->repository->create($data);

            $address = $data['address'];

            $result->addresses()->create($address);

            $contact = $data['contact'];

            $result->patient_contacts()->create($contact);

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
    public function getPatients()
    {
        return $this->repository->skipPresenter(false)->paginate();
    }

    /**
     * @param $id
     * @param $data
     * @return array
     */
    public function update($id, $data)
    {
        DB::beginTransaction();
        try {
            $data['date_birth'] = $this->invertDate($data['date_birth']);

            $patient = $this->repository->find($id);
            $patient->cpf = $data['cpf'];
            $patient->cpf_verify = $data['cpf_verify'];
            $patient->date_birth = $data['date_birth'];
            $patient->name = $data['name'];
            //$result = $this->repository->update($data, $id);
            $patient->save();
            DB::commit();

            return ['status' => 'success', 'id' => $id];

        } catch (\Exception $exception) {
            DB::rollBack();
            return ['status' => 'error', 'message' => $exception->getMessage(), 'title' => 'Erro'];
        }
    }

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
