<?php

namespace ApiWebSac\Repositories;

use ApiWebSac\Presenters\SolicitationPresenter;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use ApiWebSac\Models\Solicitation;

/**
 * Class SolicitationRepositoryEloquent.
 *
 * @package namespace ApiWebSac\Repositories;
 */
class SolicitationRepositoryEloquent extends BaseRepository implements SolicitationRepository
{
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Solicitation::class;
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
        return SolicitationPresenter::class;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        $results = $this->model
            ->where('user_id', '<>', null)
            ->orderBy('qtd', 'asc')
            ->groupBy('user_id');

        if ($results) {
            return $this->parserResult($results);
        }

        return $results;
    }

    /**
     * @param $id_status
     * @return mixed
     */
    public function countSatus($id_status)
    {
        //dd($id_status);
        $results = $this->model
            ->select(DB::raw('count(id) as qtd'))
            ->where('status_solicitation_id', $id_status)
            ->first();

        if ($results) {
            return $this->parserResult($results);
        }

        return $results;
    }

    /**
     * @param $cancelados
     * @param $concluidos
     * @return array
     * @throws \Exception
     */
    public function countMounth($cancelados, $concluidos)
    {
        $mes6 = date_format((new Carbon())->subMonth(6), 'm');
        $mes5 = date_format((new Carbon())->subMonth(5), 'm');
        $mes4 = date_format((new Carbon())->subMonth(4), 'm');
        $mes3 = date_format((new Carbon())->subMonth(3), 'm');
        $mes2 = date_format((new Carbon())->subMonth(2), 'm');
        $mes1 = date_format((new Carbon())->subMonth(1), 'm');

        $count1concluido = $this->model->where('status_solicitation_id', $concluidos)->whereMonth("updated_at", $mes1)->count();
        $count1cancelado = $this->model->where('status_solicitation_id', $cancelados)->whereMonth("updated_at", $mes1)->count();
        $count2concluido = $this->model->where('status_solicitation_id', $concluidos)->whereMonth("updated_at", $mes2)->count();
        $count2cancelado = $this->model->where('status_solicitation_id', $cancelados)->whereMonth("updated_at", $mes2)->count();
        $count3concluido = $this->model->where('status_solicitation_id', $concluidos)->whereMonth("updated_at", $mes3)->count();
        $count3cancelado = $this->model->where('status_solicitation_id', $cancelados)->whereMonth("updated_at", $mes3)->count();
        $count4concluido = $this->model->where('status_solicitation_id', $concluidos)->whereMonth("updated_at", $mes4)->count();
        $count4cancelado = $this->model->where('status_solicitation_id', $cancelados)->whereMonth("updated_at", $mes4)->count();
        $count5concluido = $this->model->where('status_solicitation_id', $concluidos)->whereMonth("updated_at", $mes5)->count();
        $count5cancelado = $this->model->where('status_solicitation_id', $cancelados)->whereMonth("updated_at", $mes5)->count();
        $count6concluido = $this->model->where('status_solicitation_id', $concluidos)->whereMonth("updated_at", $mes6)->count();
        $count6cancelado = $this->model->where('status_solicitation_id', $cancelados)->whereMonth("updated_at", $mes6)->count();

        $mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');

        $results = [
            $mes[substr($mes1, 0, 1) == 0 ? substr($mes1, 1, 1) : $mes1] => ['cancelados' => $count1cancelado, 'concluidos' => $count1concluido],
            $mes[substr($mes2, 0, 1) == 0 ? substr($mes2, 1, 1) : $mes2] => ['cancelados' => $count2cancelado, 'concluidos' => $count2concluido],
            $mes[substr($mes3, 0, 1) == 0 ? substr($mes3, 1, 1) : $mes3] => ['cancelados' => $count3cancelado, 'concluidos' => $count3concluido],
            $mes[substr($mes4, 0, 1) == 0 ? substr($mes4, 1, 1) : $mes4] => ['cancelados' => $count4cancelado, 'concluidos' => $count4concluido],
            $mes[substr($mes5, 0, 1) == 0 ? substr($mes5, 1, 1) : $mes5] => ['cancelados' => $count5cancelado, 'concluidos' => $count5concluido],
            $mes[substr($mes6, 0, 1) == 0 ? substr($mes6, 1, 1) : $mes6] => ['cancelados' => $count6cancelado, 'concluidos' => $count6concluido]
        ];

        return $results;
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getSolicitations($user)
    {
        if ($user->role == 'drs-attendant') {
            $results = $this->model
                ->where('user_id', $user->id)
                ->paginate();

            if ($results) {
                return $this->parserResult($results);
            }
            return $results;
        } else if($user->role == 'user_company'){
            $results = $this->model
                ->where('company_id',$user->company->id)
                ->paginate();

            if ($results) {
                return $this->parserResult($results);
            }
            return $results;
        } else {
            $results = $this->model
                ->paginate();

            if ($results) {
                return $this->parserResult($results);
            }
            return $results;
        }
    }
}
