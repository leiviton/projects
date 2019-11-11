<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Aug 2019 15:20:26 +0000.
 */

namespace ApiWebSac\Models\Base;

use ApiWebSac\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Patient
 * 
 * @property string $id
 * @property int $user_id
 * @property string $name
 * @property string $cpf
 * @property string $cpf_verify
 * @property \Carbon\Carbon $date_birth
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \ApiWebSac\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $addresses
 * @property \Illuminate\Database\Eloquent\Collection $patient_contacts
 * @property \Illuminate\Database\Eloquent\Collection $solicitations
 *
 * @package ApiWebSac\Models\Base
 */
class Patient extends Eloquent
{
	use SoftDeletes, UuidTrait;

    protected $keyType = 'string';

    public $incrementing = false;

	protected $casts = [
		'user_id' => 'int',
        'id' => 'string'
	];

	protected $dates = [
		'date_birth'
	];

	public function user()
	{
		return $this->belongsTo(\ApiWebSac\Models\User::class);
	}

	public function addresses()
	{
		return $this->hasMany(\ApiWebSac\Models\Address::class);
	}

	public function patient_contacts()
	{
		return $this->hasMany(\ApiWebSac\Models\PatientContact::class);
	}

	public function solicitations()
	{
		return $this->hasMany(\ApiWebSac\Models\Solicitation::class);
	}
}
