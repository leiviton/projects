<?php

namespace ApiWebSac\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class StatusSolicitation.
 *
 * @package namespace ApiWebSac\Models;
 */
class StatusSolicitation extends \ApiWebSac\Models\Base\StatusSolicitation implements Transformable,Auditable
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
        'short_description',
        'description'
    ];

}
