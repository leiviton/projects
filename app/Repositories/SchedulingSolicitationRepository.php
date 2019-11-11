<?php

namespace ApiWebSac\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface SchedulingSolicitationRepository.
 *
 * @package namespace ApiWebSac\Repositories;
 */
interface SchedulingSolicitationRepository extends RepositoryInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function getSchedulingActive($id);
}
