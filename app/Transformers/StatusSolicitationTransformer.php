<?php

namespace ApiWebSac\Transformers;

use League\Fractal\TransformerAbstract;
use ApiWebSac\Models\StatusSolicitation;

/**
 * Class StatusSolicitationTransformer.
 *
 * @package namespace ApiWebSac\Transformers;
 */
class StatusSolicitationTransformer extends TransformerAbstract
{
    /**
     * Transform the StatusSolicitation entity.
     *
     * @param \ApiWebSac\Models\StatusSolicitation $model
     *
     * @return array
     */
    public function transform(StatusSolicitation $model)
    {
        return [
            'id'         => $model->id,
            'short_description' => $model->short_description,
            'description' => $model->description,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
