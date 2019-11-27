<?php

namespace ApiWebSac\Presenters;

use ApiWebSac\Transformers\CapabilityTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CapabilityPresenter.
 *
 * @package namespace ApiWebSac\Presenters;
 */
class CapabilityPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CapabilityTransformer();
    }
}
