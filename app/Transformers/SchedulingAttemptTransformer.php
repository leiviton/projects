<?php

namespace ApiWebSac\Transformers;

use League\Fractal\TransformerAbstract;
use ApiWebSac\Models\SchedulingAttempt;

/**
 * Class SchedulingAttemptTransformer.
 *
 * @package namespace ApiWebSac\Transformers;
 */
class SchedulingAttemptTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['user'];
    /**
     * Transform the SchedulingAttempt entity.
     *
     * @param \ApiWebSac\Models\SchedulingAttempt $model
     *
     * @return array
     */
    public function transform(SchedulingAttempt $model)
    {
        return [
            'id'         => (int) $model->id,
            'phone' => $model->phone,
            'reason' => $model->reason,
            'sms' => $model->sms,
            'success' => $model->success,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    /**
     * @param SchedulingAttempt $attempt
     * @return \League\Fractal\Resource\Item
     */
    public function includeUser(SchedulingAttempt $attempt)
    {
        return $this->item($attempt->user, new UserTransformer());
    }
}
