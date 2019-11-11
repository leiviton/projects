<?php

namespace ApiWebSac\Presenters;

use ApiWebSac\Transformers\SchedulingSolicitationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SchedulingSolicitationPresenter.
 *
 * @package namespace ApiWebSac\Presenters;
 */
class SchedulingSolicitationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SchedulingSolicitationTransformer();
    }
}
