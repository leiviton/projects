<?php

namespace ApiWebSac\Presenters;

use ApiWebSac\Transformers\PatientContactTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PatientContactPresenter.
 *
 * @package namespace ApiWebSac\Presenters;
 */
class PatientContactPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PatientContactTransformer();
    }
}
