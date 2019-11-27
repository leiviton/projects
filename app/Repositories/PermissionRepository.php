<?php

namespace ApiWebSac\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PermissionRepository.
 *
 * @package namespace ApiWebSac\Repositories;
 */
interface PermissionRepository extends RepositoryInterface
{
    /**
     * @param $name
     * @return mixed
     */
    public function findWherePermission($name);
}
