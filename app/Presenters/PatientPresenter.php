<?php

namespace ApiWebSac\Presenters;

use ApiWebSac\Transformers\PatientTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PatientPresenter.
 *
 * @package namespace ApiWebSac\Presenters;
 */
class PatientPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PatientTransformer();
    }
}
