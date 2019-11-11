<?php
/**
 * Created by PhpStorm.
 * User: leiviton.silva
 * Date: 13/03/2019
 * Time: 10:21
 */

namespace ApiWebSac\Services;


use ApiWebSac\Repositories\AddressRepository;
use ApiWebSac\Repositories\PatientRepository;
use Illuminate\Support\Facades\DB;

class AddressService
{
    /**
     * @var AddressRepository
     */
    private $addressRepository;
    /**
     * @var PatientRepository
     */
    private $patientRepository;


    /**
     * AddressService constructor.
     * @param AddressRepository $addressRepository
     * @param PatientRepository $patientRepository
     */
    public function __construct(AddressRepository $addressRepository, PatientRepository $patientRepository)
    {
        $this->addressRepository = $addressRepository;
        $this->patientRepository = $patientRepository;
    }

    /**
     * @param $limit
     * @return mixed
     */
    public function getBuyer($limit)
    {
        return $this->addressRepository->skipPresenter(false)->paginate($limit);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getId($id)
    {
        return $this->addressRepository->skipPresenter(false)->find($id);
    }

    /**
     * @param $data
     * @param int $id
     * @return array
     */
    public function update($data, int $id)
    {
        DB::beginTransaction();
        try {

            $result = $this->addressRepository->update($data, $id);

            DB::commit();

            return ['status' => 'success', 'id' => $result->id];

        } catch (\Exception $exception) {
            DB::rollBack();

            return ['status' => 'error', 'message' => $exception->getMessage(), 'title' => 'Erro'];
        }
    }

    /**
     * @param $data
     * @return array
     */
    public function create($data)
    {
        DB::beginTransaction();
        try {
            $result = $this->addressRepository->create($data);

            DB::commit();
            //dd($result);
            return ['status' => 'success', 'id' => $result->id];
        } catch (\Exception $exception) {
            DB::rollBack();

            return ['status' => 'error', 'message' => $exception->getMessage(), 'title' => 'Erro'];
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function patient($id)
    {
        return $this->patientRepository->skipPresenter(false)->find($id);
    }
}
