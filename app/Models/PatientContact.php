<?php

namespace ApiWebPsp\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PatientContact.
 *
 * @package namespace ApiWebPsp\Models;
 */
class PatientContact extends \ApiWebPsp\Models\Base\PatientContact implements Transformable,Auditable
{
    use TransformableTrait;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'email',
        'cellphone',
        'phone'
    ];

}
