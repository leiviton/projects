<?php

namespace ApiWebSac\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserPermissionRepository.
 *
 * @package namespace ApiWebSac\Repositories;
 */
interface UserPermissionRepository extends RepositoryInterface
{
    /**
     * @param $id
     * @param $idUser
     * @return mixed
     */
    public function findWherePermission($id, $idUser);
}
