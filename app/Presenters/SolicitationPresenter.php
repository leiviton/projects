<?php

namespace ApiWebSac\Presenters;

use ApiWebSac\Transformers\SolicitationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SolicitationPresenter.
 *
 * @package namespace ApiWebSac\Presenters;
 */
class SolicitationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SolicitationTransformer();
    }
}
