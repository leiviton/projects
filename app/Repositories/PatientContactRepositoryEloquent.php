<?php

namespace ApiWebPsp\Repositories;

use ApiWebPsp\Presenters\PatientContactPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ApiWebPsp\Models\PatientContact;

/**
 * Class PatientContactRepositoryEloquent.
 *
 * @package namespace ApiWebPsp\Repositories;
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
