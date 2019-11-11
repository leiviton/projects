<?php

namespace ApiWebSac\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PatientRepository.
 *
 * @package namespace ApiWebSac\Repositories;
 */
interface PatientRepository extends RepositoryInterface
{
    /**
     * @param $status
     * @return mixed
     */
    public function listPatients();

    /**
     * @param $status
     * @return mixed
     */
    public function listPatientsTrash();

    /**
     * @param $cpf
     * @return mixed
     */
    public function getCpf($cpf);
}
