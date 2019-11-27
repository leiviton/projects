<?php

namespace ApiWebSac\Models;

use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Permission.
 *
 * @package namespace ApiWebSac\Models;
 */
class Permission extends \ApiWebSac\Models\Base\Permission implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'label'
    ];

}
