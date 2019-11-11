<?php

namespace ApiWebSac\Presenters;

use ApiWebSac\Transformers\AddressTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AddressPresenter.
 *
 * @package namespace ApiWebSac\Presenters;
 */
class AddressPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AddressTransformer();
    }
}
