<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Aug 2019 15:20:26 +0000.
 */

namespace ApiWebPsp\Models\Base;

use ApiWebPsp\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Receiver
 * 
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $cpf
 * @property string $cpf_verify
 * @property \Carbon\Carbon $date_birth
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \ApiWebPsp\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $addresses
 * @property \Illuminate\Database\Eloquent\Collection $receiver_contacts
 * @property \Illuminate\Database\Eloquent\Collection $solicitations
 *
 * @package ApiWebPsp\Models\Base
 */
class Receiver extends Eloquent
{
	use SoftDeletes;

	protected $casts = [
		'user_id' => 'int',
        'id' => 'int'
	];

	protected $dates = [
		'date_birth'
	];

	public function user()
	{
		return $this->belongsTo(\ApiWebPsp\Models\User::class);
	}

	public function addresses()
	{
		return $this->hasMany(\ApiWebPsp\Models\Address::class);
	}

	public function receiver_contacts()
	{
		return $this->hasMany(\ApiWebPsp\Models\ReceiverContact::class);
	}

	public function solicitations()
	{
		return $this->hasMany(\ApiWebPsp\Models\Solicitation::class);
	}
}
