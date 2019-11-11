<?php

namespace ApiWebSac\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface SchedulingAttemptRepository.
 *
 * @package namespace ApiWebSac\Repositories;
 */
interface SchedulingAttemptRepository extends RepositoryInterface
{
    //
    /**
     * @param $id
     * @return mixed
     */
    public function countAttempts($id);
}
