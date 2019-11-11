<?php

namespace ApiWebSac\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface SolicitationRepository.
 *
 * @package namespace ApiWebSac\Repositories;
 */
interface SolicitationRepository extends RepositoryInterface
{
    /**
     * @return mixed
     */
    public function getIdUser();

    /**
     * @param $id_status
     * @return mixed
     */
    public function countSatus($id_status);

    /**
     * @param $cancelados
     * @param $concluidos
     * @return array
     * @throws \Exception
     */
    public function countMounth($cancelados, $concluidos);

    /**
     * @param $user
     * @return mixed
     */
    public function getSolicitations($user);
}
