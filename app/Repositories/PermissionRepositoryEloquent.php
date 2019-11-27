<?php

namespace ApiWebSac\Repositories;

use ApiWebSac\Presenters\PermissionPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ApiWebSac\Models\Permission;

/**
 * Class PermissionRepositoryEloquent.
 *
 * @package namespace ApiWebSac\Repositories;
 */
class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{
    protected $skipPresenter = true;

    /**
     * @param $name
     * @return mixed
     */
    public function findWherePermission($name){
        return $this->model->where('name',$name)->first();
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }


    /**
     * Boot up the repository, pushing criteria
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return PermissionPresenter::class;
    }

}
