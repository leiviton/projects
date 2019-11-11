<?php

namespace ApiWebSac\Presenters;

use ApiWebSac\Transformers\SolicitationItemTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SolicitationItemPresenter.
 *
 * @package namespace ApiWebSac\Presenters;
 */
class SolicitationItemPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SolicitationItemTransformer();
    }
}
