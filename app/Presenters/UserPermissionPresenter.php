<?php

namespace ApiWebSac\Presenters;

use ApiWebSac\Transformers\UserPermissionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserPermissionPresenter.
 *
 * @package namespace ApiWebSac\Presenters;
 */
class UserPermissionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserPermissionTransformer();
    }
}
