<?php
/**
 * Created by PhpStorm.
 * User: leiviton.silva
 * Date: 17/04/2019
 * Time: 16:03
 */

namespace ApiWebSac\Services;

use ApiWebSac\Repositories\AddressRepository;
use ApiWebSac\Repositories\PatientRepository;
use ApiWebSac\Repositories\SchedulingAttemptRepository;
use ApiWebSac\Repositories\SchedulingSolicitationRepository;
use ApiWebSac\Repositories\SolicitationRepository;
use ApiWebSac\Repositories\StatusSolicitationRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SolicitationService
{
    /**
     * @var SolicitationRepository
     */
    private $repository;
    /**
     * @var PatientRepository
     */
    private $repositoryPatient;
    /**
     * @var StatusSolicitationRepository
     */
    private $statusSolicitationRepository;
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
     * @param PatientRepository $repositoryPatient
     * @param StatusSolicitationRepository $statusSolicitationRepository
     * @param SchedulingSolicitationRepository $schedulingSolicitationRepository
     * @param AddressRepository $addressRepository
     * @param SchedulingAttemptRepository $attemptRepository
     */
    public function __construct(SolicitationRepository $repository,
                                PatientRepository $repositoryPatient,
                                StatusSolicitationRepository $statusSolicitationRepository,
                                SchedulingSolicitationRepository $schedulingSolicitationRepository,
                                AddressRepository $addressRepository,
                                SchedulingAttemptRepository $attemptRepository)
    {
        $this->repository = $repository;
        $this->repositoryPatient = $repositoryPatient;
        $this->statusSolicitationRepository = $statusSolicitationRepository;
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
    public function getSolicitations()
    {
        $user = Auth::guard('api')->user();
        return $this->repository->skipPresenter(false)->orderBy('created_at', 'desc')->getSolicitations($user);
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

            $result = $this->repository->update($data, $id);

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
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public function createPatient($data)
    {
        DB::beginTransaction();
        try {

            $result = $this->repositoryPatient->create($data);

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
        $statusEnviadoAoSite = $this->statusSolicitationRepository->findWhere(['short_description' => 'Enviado ao site'])->first();
        $statusEmTransito = $this->statusSolicitationRepository->findWhere(['short_description' => 'Em Transito'])->first();
        $statusConcluido = $this->statusSolicitationRepository->findWhere(['short_description' => 'Concluido'])->first();
        $statusAguardandoExpedicao = $this->statusSolicitationRepository->findWhere(['short_description' => 'Aguardando expedicao'])->first();
        $statusPendente = $this->statusSolicitationRepository->findWhere(['short_description' => 'Pendente'])->first();
        $statusCancelados = $this->statusSolicitationRepository->findWhere(['short_description' => 'Cancelado'])->first();
        $statusEmAtendimento = $this->statusSolicitationRepository->findWhere(['short_description' => 'Em atendimento'])->first();
        $statusNovo = $this->statusSolicitationRepository->findWhere(['short_description' => 'Chamado Novo'])->first();

        $contadorEnviadoAoSite = $this->repository->countSatus($statusEnviadoAoSite->id);
        $contadorEmTransito = $this->repository->countSatus($statusEmTransito->id);
        $contadorConcluido = $this->repository->countSatus($statusConcluido->id);
        $contadorAguardandoExpedicao = $this->repository->countSatus($statusAguardandoExpedicao->id);
        $contadorPendente = $this->repository->countSatus($statusPendente->id);
        $contadorCancelados = $this->repository->countSatus($statusCancelados->id);
        $contadorEmAtendimento = $this->repository->countSatus($statusEmAtendimento->id);
        $contadorNovo = $this->repository->countSatus($statusNovo->id);

        return ['novo' => $contadorNovo->qtd, 'em_atendimento' => $contadorEmAtendimento->qtd, 'enviado_site' => $contadorEnviadoAoSite->qtd,
            'em_transito' => $contadorEmTransito->qtd, 'concluido' => $contadorConcluido->qtd, 'aguardando_expedicao' => $contadorAguardandoExpedicao->qtd,
            'pendente' => $contadorPendente->qtd, 'cancelados' => $contadorCancelados->qtd];
    }

    /**
     * @param $id
     * @return array
     */
    public function initSolicitation($id)
    {
        DB::beginTransaction();
        try {
            $status = $this->statusSolicitationRepository->findWhere(['short_description' => 'Em atendimento'])->first();

            $solicitation = $this->repository->find($id);

            $solicitation->status_solicitation_id = $status->id;

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

                $statusEmAtendimento = $this->statusSolicitationRepository->findWhere(['short_description' => 'Agendado aguardando visita'])->first();

                $solicitation->status_solicitation_id = $statusEmAtendimento->id;

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
     */
    public function canledScheduling($id)
    {
        DB::beginTransaction();
        try {
            $result = $this->schedulingSolicitationRepository->find($id);

            $result->status = 'inativo';

            $solicitation = $this->repository->find($result->solicitation_id);

            $statusCancelados = $this->statusSolicitationRepository->findWhere(['short_description' => 'Cancelado'])->first();

            $solicitation->status_solicitation_id = $statusCancelados->id;

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
        $statusConcluido = $this->statusSolicitationRepository->findWhere(['short_description' => 'Concluido'])->first();
        $statusCancelados = $this->statusSolicitationRepository->findWhere(['short_description' => 'Cancelado'])->first();

        return $this->repository->countMounth($statusCancelados->id, $statusConcluido->id);
    }

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
}
