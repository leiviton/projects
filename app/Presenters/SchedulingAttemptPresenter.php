<?php

namespace ApiWebSac\Presenters;

use ApiWebSac\Transformers\SchedulingAttemptTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SchedulingAttemptPresenter.
 *
 * @package namespace ApiWebSac\Presenters;
 */
class SchedulingAttemptPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SchedulingAttemptTransformer();
    }
}
