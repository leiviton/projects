<?php

namespace ApiWebPsp\Transformers;

use League\Fractal\TransformerAbstract;
use ApiWebPsp\Models\UserPermission;

/**
 * Class UserPermissionTransformer.
 *
 * @package namespace ApiWebPsp\Transformers;
 */
class UserPermissionTransformer extends TransformerAbstract
{
    /**
     * Transform the UserPermission entity.
     *
     * @param \ApiWebPsp\Models\UserPermission $model
     *
     * @return array
     */
    public function transform(UserPermission $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
