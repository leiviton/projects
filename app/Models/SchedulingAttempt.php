<?php

namespace ApiWebSac\Models;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SchedulingAttempt.
 *
 * @package namespace ApiWebSac\Models;
 */
class SchedulingAttempt extends \ApiWebSac\Models\Base\SchedulingAttempt implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone',
        'reason',
        'sms',
        'solicitation_id',
        'user_id',
        'success'
    ];

}
