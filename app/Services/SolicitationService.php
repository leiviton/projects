<?php
/**
 * Created by PhpStorm.
 * User: leiviton.silva
 * Date: 17/04/2019
 * Time: 16:03
 */

namespace ApiWebPsp\Services;

use ApiWebPsp\Repositories\AddressRepository;
use ApiWebPsp\Repositories\ReceiverRepository;
use ApiWebPsp\Repositories\SchedulingAttemptRepository;
use ApiWebPsp\Repositories\SchedulingSolicitationRepository;
use ApiWebPsp\Repositories\SolicitationRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SolicitationService
{
    /**
     * @var SolicitationRepository
     */
    private $repository;
    /**
     * @var ReceiverRepository
     */
    private $repositoryReceiver;
    /**
     * @var SchedulingSolicitationRepository
     */
    private $schedulingSolicitationRepository;
    /**
     * @var AddressRepository
     */
    private $addressRepository;
    /**
     * @var SchedulingAttemptRepository
     */
    private $attemptRepository;

    /**
     * SolicitationService constructor.
     * @param SolicitationRepository $repository
     * @param ReceiverRepository $repositoryReceiver
     * @param SchedulingSolicitationRepository $schedulingSolicitationRepository
     * @param AddressRepository $addressRepository
     * @param SchedulingAttemptRepository $attemptRepository
     */
    public function __construct(SolicitationRepository $repository,
                                ReceiverRepository $repositoryReceiver,
                                SchedulingSolicitationRepository $schedulingSolicitationRepository,
                                AddressRepository $addressRepository,
                                SchedulingAttemptRepository $attemptRepository)
    {
        $this->repository = $repository;
        $this->repositoryReceiver = $repositoryReceiver;
        $this->schedulingSolicitationRepository = $schedulingSolicitationRepository;
        $this->addressRepository = $addressRepository;
        $this->attemptRepository = $attemptRepository;
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
     * @param $id
     * @return mixed
     */
    public function getSolicitation($id)
    {
        return $this->repository->find($id);
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
            $items = $data['items'];
            $result = $this->repository->create($data);
            foreach ($items as $item) {
                //$item['expiration_date'] = $item['expiration_date'] != '' && $item['expiration_date'] != null ? $this->invertDate($item['expiration_date']) : null;
                $result->solicitation_items()->create($item);
            }

            QrCode::format('png')->size(350)->generate($result->voucher,public_path("storage/qrcode/".$result->voucher.'.png'));

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
    public function getSolicitations($status = 'aberto')
    {
        $user = Auth::guard('api')->user();
        return $this->repository->skipPresenter(false)->orderBy('created_at', 'desc')->getSolicitations($user,$status);
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

            $this->repository->update($data, $id);

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

            $this->repository->delete($id);

            DB::commit();

            return ['status' => 'success', 'id' => $id];

        } catch (\Exception $exception) {
            DB::rollBack();
            return ['status' => 'error', 'message' => $exception->getMessage(), 'title' => 'Erro'];
        }
    }

    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public function createReceiver($data)
    {
        DB::beginTransaction();
        try {

            $result = $this->repositoryReceiver->create($data);

            $address = $data['address'];

            $result->addresses()->create($address);

            $contact = $data['contact'];

            $result->Receiver_contacts()->create($contact);

            DB::commit();

            return ['status' => 'success', 'id' => $result->id];

        } catch (\Exception $exception) {
            DB::rollBack();
            return ['status' => 'error', 'message' => $exception->getMessage(), 'title' => 'Erro'];
        }
    }

    public function assignAnalyst()
    {
        return $this->repository->getIdUser();
    }

    /**
     * @param $date
     * @return string
     * @throws \Exception
     */
    public function invertDate($date)
    {
        $result = '';
        if (count(explode("/", $date)) > 1) {
            $result = implode("-", array_reverse(explode("/", $date)));
            return $result;
        } else if (count(explode("-", $date)) > 1) {
            $result = implode("/", array_reverse(explode("-", $date)));
            return $result;
        }
    }

    /**
     * @return mixed
     */
    public function countStatus()
    {
        $contadorConcluido = $this->repository->countSatus('success');
        $contadorPendente = $this->repository->countSatus('pending');
        $contadorCancelados = $this->repository->countSatus('canceled');
        $contadorNovo = $this->repository->countSatus('created');

        return ['created' => $contadorNovo->qtd, 'success' => $contadorConcluido->qtd, 'pending' => $contadorPendente->qtd,
            'canceled' => $contadorCancelados->qtd];
    }

    /**
     * @param $id
     * @return array
     * @throws \Exception
     */
    public function initSolicitation($id)
    {
        DB::beginTransaction();
        try {
            //$status = $this->statusSolicitationRepository->findWhere(['short_description' => 'Em atendimento'])->first();

            $solicitation = $this->repository->find($id);

            //$solicitation->status_solicitation_id = $status->id;

            $solicitation->save();

            DB::commit();

            return ['status' => 'success', 'id' => $id];

        } catch (\Exception $exception) {
            DB::rollBack();
            return ['status' => 'error', 'message' => $exception->getMessage(), 'title' => 'Erro'];
        }
    }

    /**
     * @param $data
     * @return array
     * @throws \Exception
     */
    public function scheduling($data)
    {
        $verifyActive = $this->schedulingSolicitationRepository->getSchedulingActive($data['solicitation_id']);
        //dd($verifyActive);
        if ($verifyActive == 0) {
            DB::beginTransaction();
            try {

                $solicitation = $this->repository->find($data['solicitation_id']);
                //dd($solicitation);
                $result = $this->schedulingSolicitationRepository->create($data);

                $solicitation->save();

                DB::commit();
                //dd($result);
                return ['status' => 'success', 'id' => $solicitation->id, 'scheduling' => $result];

            } catch (\Exception $exception) {
                DB::rollBack();
                return ['status' => 'error', 'message' => $exception->getMessage(), 'title' => 'Erro'];
            }
        } else {
            return ['status' => 'error', 'message' => 'Existe agendamento para a solicitação, cancele o agendamento para realizar um novo', 'title' => 'Erro'];
        }
    }

    /**
     * @param $id
     * @return array
     * @throws \Exception
     */
    public function canledScheduling($id)
    {
        DB::beginTransaction();
        try {
            $result = $this->schedulingSolicitationRepository->find($id);

            $result->status = 'inativo';

            $solicitation = $this->repository->find($result->solicitation_id);

            $solicitation->status = 'cancelled';

            $result->save();

            $solicitation->save();

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
     * @param $all
     * @return array
     * @throws \Exception
     */
    public function updateAddress($id, $all)
    {
        DB::beginTransaction();
        try {
            $result = $this->addressRepository->create($all);

            $solicitation = $this->repository->find($id);

            $solicitation->address_id = $result->id;

            $solicitation->save();

            DB::commit();

            //dd($result);
            return ['status' => 'success', 'id' => $solicitation->id];

        } catch (\Exception $exception) {
            DB::rollBack();
            return ['status' => 'error', 'message' => $exception->getMessage(), 'title' => 'Erro'];
        }
    }

    /**
     * @param $data
     * @return array
     * @throws \Exception
     */
    public function attempt($data)
    {
        DB::beginTransaction();
        try {
            $result = $this->attemptRepository->create($data);

            DB::commit();
            //dd($result);
            return ['status' => 'success', 'id' => $data['solicitation_id'], 'scheduling' => $result];

        } catch (\Exception $exception) {
            DB::rollBack();
            return ['status' => 'error', 'message' => $exception->getMessage(), 'title' => 'Erro'];
        }
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function countMounth()
    {
        $statusConcluido = $this->repository->findWhere(['status' => 'aberto'])->first();
        $statusCancelados = $this->repository->findWhere(['status' => ''])->first();

        return $this->repository->countMounth($statusCancelados->id, $statusConcluido->id);
    }

    /**
     * @param $idSolicitation
     * @param $idUser
     * @return array
     * @throws \Exception
     */
    public function updateAttendant($idSolicitation, $idUser)
    {
        DB::beginTransaction();
        try {
            //dd($idSolicitation);
            $solicitation = $this->repository->find($idSolicitation);
            $solicitation->user_id = $idUser;
            $solicitation->save();
            DB::commit();
            //dd($result);
            return ['status' => 'success'];

        } catch (\Exception $exception) {
            DB::rollBack();
            return ['status' => 'error', 'message' => $exception->getMessage(), 'title' => 'Erro'];
        }
    }

    public function countNow()
    {
        return $this->repository->countStatusNow();
    }



}
