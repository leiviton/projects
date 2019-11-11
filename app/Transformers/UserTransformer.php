<?php

namespace ApiWebSac\Transformers;

use League\Fractal\TransformerAbstract;
use ApiWebSac\Models\User;

/**
 * Class UserTransformer.
 *
 * @package namespace ApiWebSac\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['company'];

    /**
     * Transform the User entity.
     *
     * @param \ApiWebSac\Models\User $model
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
}
