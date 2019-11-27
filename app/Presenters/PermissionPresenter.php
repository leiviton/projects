<?php

namespace ApiWebSac\Presenters;

use ApiWebSac\Transformers\PermissionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PermissionPresenter.
 *
 * @package namespace ApiWebSac\Presenters;
 */
class PermissionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PermissionTransformer();
    }
}
