<?php

namespace ApiWebPsp\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Solicitation.
 *
 * @package namespace ApiWebPsp\Models;
 */
class Solicitation extends \ApiWebPsp\Models\Base\Solicitation implements Transformable,Auditable
{
    use TransformableTrait;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'receiver_id',
        'voucher',
        'type',
        'date_scheduling',
        'schedule_time',
        'address_id',
        'sends'
    ];

}
