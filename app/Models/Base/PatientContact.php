<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Aug 2019 15:13:46 +0000.
 */

namespace ApiWebSac\Models\Base;

use ApiWebSac\Models\Traits\UuidTrait;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PatientContact
 * 
 * @property string $id
 * @property string $patient_id
 * @property string $email
 * @property string $cellphone
 * @property string $phone
 * @property string $status
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \ApiWebSac\Models\Patient $patient
 *
 * @package ApiWebSac\Models\Base
 */
class PatientContact extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes, UuidTrait;

    protected $keyType = 'string';

    public $incrementing = false;

	protected $casts = [
		'patient_id' => 'string',
        'id' => 'string'
	];

	public function patient()
	{
		return $this->belongsTo(\ApiWebSac\Models\Patient::class);
	}
}
