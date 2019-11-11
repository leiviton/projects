<?php

namespace ApiWebSac\Repositories;

use ApiWebSac\Presenters\PatientContactPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ApiWebSac\Models\PatientContact;

/**
 * Class PatientContactRepositoryEloquent.
 *
 * @package namespace ApiWebSac\Repositories;
 */
class PatientContactRepositoryEloquent extends BaseRepository implements PatientContactRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PatientContact::class;
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
        return PatientContactPresenter::class;
    }

}
