<?php

namespace ApiWebPsp\Transformers;

use League\Fractal\TransformerAbstract;
use ApiWebPsp\Models\Receiver;

/**
 * Class ReceiverTransformer.
 *
 * @package namespace ApiWebPsp\Transformers;
 */
class ReceiverTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['address','contact'];

    /**
     * Transform the Receiver entity.
     *
     * @param \ApiWebPsp\Models\Receiver $model
     *
     * @return array
     */
    public function transform(Receiver $model)
    {
        return [
            'id'         => $model->id,
            'name' => $model->name,
            'cpf' => $model->cpf,
            'cpf_verify' => $model->cpf_verify,
            'date_birth' => $model->date_birth,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    /**
     * @param Receiver $receiver
     * @return \League\Fractal\Resource\Collection|null
     */
    public function includeAddress(Receiver $receiver)
    {
        return $receiver->addresses ? $this->collection($receiver->addresses, new AddressTransformer()) : null;
    }

    /**
     * @param Receiver $receiver
     * @return \League\Fractal\Resource\Collection|null
     */
    public function includeContact(Receiver $receiver)
    {
        return $receiver->receiver_contacts ? $this->collection($receiver->receiver_contacts, new ReceiverContactTransformer()) : null;
    }
}
