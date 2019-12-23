<?php

namespace ApiWebPsp\Transformers;

use League\Fractal\TransformerAbstract;
use ApiWebPsp\Models\ReceiverContact;

/**
 * Class PatientContactTransformer.
 *
 * @package namespace ApiWebPsp\Transformers;
 */
class ReceiverContactTransformer extends TransformerAbstract
{
    /**
     * Transform the PatientContact entity.
     *
     * @param \ApiWebPsp\Models\ReceiverContact $model
     *
     * @return array
     */
    public function transform(ReceiverContact $model)
    {
        return [
            'id'         =>  $model->id,
            'email' => $model->email,
            'cellphone' => $model->cellphone,
            'phone' => $model->phone,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
