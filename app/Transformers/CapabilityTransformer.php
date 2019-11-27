<?php

namespace ApiWebSac\Transformers;

use League\Fractal\TransformerAbstract;
use ApiWebSac\Models\Capability;

/**
 * Class CapabilityTransformer.
 *
 * @package namespace ApiWebSac\Transformers;
 */
class CapabilityTransformer extends TransformerAbstract
{
    /**
     * Transform the Capability entity.
     *
     * @param \ApiWebSac\Models\Capability $model
     *
     * @return array
     */
    public function transform(Capability $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
