<?php

namespace ApiWebSac\Repositories;

use ApiWebSac\Presenters\SchedulingAttemptPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ApiWebSac\Models\SchedulingAttempt;

/**
 * Class SchedulingAttemptRepositoryEloquent.
 *
 * @package namespace ApiWebSac\Repositories;
 */
class SchedulingAttemptRepositoryEloquent extends BaseRepository implements SchedulingAttemptRepository
{
    protected $skipPresenter = true;

    /**
     * @param $id
     * @return mixed
     */
    public function countAttempts($id)
    {
        return $this->model->where('solicitation_id',$id)->count();
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return SchedulingAttempt::class;
    }


    /**
     * Boot up the repository, pushing criteria
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    /**
     * @return string
     */
    public function presenter()
    {
        return SchedulingAttemptPresenter::class;
    }

}
