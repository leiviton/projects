<?php
/**
 * Created by PhpStorm.
 * User: leiviton.silva
 * Date: 13/03/2019
 * Time: 10:33
 */

namespace ApiWebSac\Services;

use ApiWebSac\Repositories\PermissionRepository;

class PermissionService
{
    /**
     * @var PermissionRepository
     */
    private $repository;

    /**
     * PermissionService constructor.
     * @param PermissionRepository $repository
     */
    public function __construct(PermissionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->repository->paginate();
    }
}
