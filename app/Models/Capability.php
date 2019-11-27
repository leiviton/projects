<?php

namespace ApiWebSac\Models;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Capability.
 *
 * @package namespace ApiWebSac\Models;
 */
class Capability extends \ApiWebSac\Models\Base\Capability implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city',
        'city_without_accent',
        'key_primary',
        'uf',
        'fly_agent',
        'fly_airline_highway',
        'fly_sla',
        'spd_agent',
        'spd_airline_highway',
        'spd_sla',
        'std_agent',
        'std_airline_highway',
        'std_sla',
        'obs'
    ];

}
