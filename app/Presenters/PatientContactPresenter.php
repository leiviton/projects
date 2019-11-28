<?php

namespace ApiWebPsp\Presenters;

use ApiWebPsp\Transformers\PatientContactTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PatientContactPresenter.
 *
 * @package namespace ApiWebPsp\Presenters;
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
