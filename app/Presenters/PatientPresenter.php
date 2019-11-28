<?php

namespace ApiWebPsp\Presenters;

use ApiWebPsp\Transformers\PatientTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PatientPresenter.
 *
 * @package namespace ApiWebPsp\Presenters;
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
