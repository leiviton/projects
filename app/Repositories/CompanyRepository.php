<?php

namespace ApiWebSac\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CompanyRepository.
 *
 * @package namespace ApiWebSac\Repositories;
 */
interface CompanyRepository extends RepositoryInterface
{
    /**
     * @param $status
     * @return mixed
     */
    public function listCompanies($status);

    /**
     * @param $status
     * @return mixed
     */
    public function listCompaniesTrash();
}
