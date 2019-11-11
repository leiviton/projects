<?php

namespace ApiWebSac\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SchedulingSolicitation.
 *
 * @package namespace ApiWebSac\Models;
 */
class SchedulingSolicitation extends \ApiWebSac\Models\Base\SchedulingSolicitation implements Transformable,Auditable
{
    use TransformableTrait;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'solicitation_id',
        'date_scheduling',
        'date_canceled',
        'schedule_time',
        'user_create',
        'user_canceled',
        'period',
        'status',
        'note',
        'auth_contact'
    ];

}
