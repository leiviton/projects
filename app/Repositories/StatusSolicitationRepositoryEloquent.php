<?php

namespace ApiWebSac\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ApiWebSac\Repositories\StatusSolicitationRepository;
use ApiWebSac\Models\StatusSolicitation;
use ApiWebSac\Validators\StatusSolicitationValidator;

/**
 * Class StatusSolicitationRepositoryEloquent.
 *
 * @package namespace ApiWebSac\Repositories;
 */
class StatusSolicitationRepositoryEloquent extends BaseRepository implements StatusSolicitationRepository
{
    protected $skipPresenter = true;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return StatusSolicitation::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
