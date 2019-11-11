<?php

namespace ApiWebSac\Presenters;

use ApiWebSac\Transformers\StatusSolicitationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class StatusSolicitationPresenter.
 *
 * @package namespace ApiWebSac\Presenters;
 */
class StatusSolicitationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StatusSolicitationTransformer();
    }
}
