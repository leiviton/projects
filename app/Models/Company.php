<?php

namespace ApiWebPsp\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Company.
 *
 * @package namespace ApiWebPsp\Models;
 */
class Company extends \ApiWebPsp\Models\Base\Company implements Transformable,Auditable
{
    use TransformableTrait, SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cnpj',
        'name',
        'logo',
        'contact_name',
        'phone',
        'email',
        'status'
    ];

}
