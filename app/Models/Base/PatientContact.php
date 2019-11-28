<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Aug 2019 15:13:46 +0000.
 */

namespace ApiWebPsp\Models\Base;

use ApiWebPsp\Models\Traits\UuidTrait;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PatientContact
 * 
 * @property int $id
 * @property int $patient_id
 * @property string $email
 * @property string $cellphone
 * @property string $phone
 * @property string $status
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \ApiWebPsp\Models\Patient $patient
 *
 * @package ApiWebPsp\Models\Base
 */
class PatientContact extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'patient_id' => 'string',
        'id' => 'string'
	];

	public function patient()
	{
		return $this->belongsTo(\ApiWebPsp\Models\Patient::class);
	}
}
