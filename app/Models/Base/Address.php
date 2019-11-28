<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 12 Aug 2019 21:20:27 +0000.
 */

namespace ApiWebSac\Models\Base;

use ApiWebSac\Models\Traits\UuidTrait;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Address
 * 
 * @property int $id
 * @property int $patient_id
 * @property string $street
 * @property string $number
 * @property string $complement
 * @property string $neighborhood
 * @property string $postal_code
 * @property string $type
 * @property string $status
 * @property string $city
 * @property string $uf
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \ApiWebSac\Models\Patient $patient
 *
 * @package ApiWebSac\Models\Base
 */
class Address extends Eloquent
{
	protected $casts = [
		'patient_id' => 'int',
        'id' => 'int'
	];

	protected $dates = [
	    'deleted_at',
        'created_at',
        'updated_at'
    ];

	public function patient()
	{
		return $this->belongsTo(\ApiWebSac\Models\Patient::class);
	}
}
