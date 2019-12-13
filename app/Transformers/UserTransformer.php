<?php

namespace ApiWebPsp\Transformers;

use League\Fractal\TransformerAbstract;
use ApiWebPsp\Models\User;

/**
 * Class UserTransformer.
 *
 * @package namespace ApiWebPsp\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['company','permission'];

    /**
     * Transform the User entity.
     *
     * @param \ApiWebPsp\Models\User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'email' => $model->email,
            'role' => $model->role,
            'status' => $model->status,
            'img_profile' => env('APP_URL').'/storage/users/'.$model->img_profile,
            /* place your other model properties here */

            'last_login_at' => $model->last_login_at,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    /**
     * @param User $user
     * @return \League\Fractal\Resource\Item|null
     */
    public function includeCompany(User $user)
    {
        return $user->company ? $this->item($user->company, new CompanyTransformer()): null;
    }

    public function includePermission(User $user)
    {
        return $user->permissions ? $this->collection($user->permissions, new PermissionTransformer()) : null;
    }
}
