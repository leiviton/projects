<?php

namespace ApiWebSac\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProductRepository.
 *
 * @package namespace ApiWebSac\Repositories;
 */
interface ProductRepository extends RepositoryInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function productFilter($data);
}
