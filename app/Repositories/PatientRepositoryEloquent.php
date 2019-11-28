<?php

namespace ApiWebPsp\Repositories;

use ApiWebPsp\Presenters\PatientPresenter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ApiWebPsp\Models\Patient;

/**
 * Class PatientRepositoryEloquent.
 *
 * @package namespace ApiWebPsp\Repositories;
 */
class PatientRepositoryEloquent extends BaseRepository implements PatientRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Patient::class;
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
        return PatientPresenter::class;
    }

    /**
     * @param $status
     * @return mixed
     */
    public function listPatients()
    {
        $result = $this->model->orderBy('name')
            ->paginate();
        if ($result) {
            return $this->parserResult($result);
        }
        throw (new ModelNotFoundException())->setModel($this->model());
    }

    /**
     * @param $cpf
     * @return mixed
     */
    public function getCpf($cpf)
    {
        $result = $this->model->where('cpf',$cpf)
            ->first();

        if ($result) {
            return $this->parserResult($result);
        }else{
            return response()->json(['data' => []]);
        }

    }

    /**
     * @param $status
     * @return mixed
     */
    public function listPatientsTrash()
    {
        $result = $this->model->where('deleted_at', '<>', null)->orderBy('name')->withTrashed()
            ->paginate();
        if ($result) {
            return $this->parserResult($result);
        }
        throw (new ModelNotFoundException())->setModel($this->model());
    }
}
