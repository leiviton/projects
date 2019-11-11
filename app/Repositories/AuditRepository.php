<?php

namespace ApiWebSac\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AuditRepository.
 *
 * @package namespace ApiWebSac\Repositories;
 */
interface AuditRepository extends RepositoryInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function auditFilter($data);
}
