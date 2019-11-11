<?php

namespace ApiWebSac\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository.
 *
 * @package namespace ApiWebSac\Repositories;
 */
interface UserRepository extends RepositoryInterface
{
    /**
     * @param $status
     * @return mixed
     */
    public function listUsers($status);

    /**
     * @param $status
     * @return mixed
     */
    public function listUsersTrash($status);

    /**
     * @return mixed
     */
    public function listUsersAttendant();
}
