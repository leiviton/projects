<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 24 Jan 2020 10:28:45 -0200.
 */

namespace ApiWebPsp\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Receiver
 * 
 * @property int $id
 * @property string $name
 * @property string $document
 * @property string $genre
 * @property string $type
 * @property \Carbon\Carbon $date_birth
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $user_id
 * 
 * @property \ApiWebPsp\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $addresses
 * @property \Illuminate\Database\Eloquent\Collection $authorized_people
 * @property \Illuminate\Database\Eloquent\Collection $receiver_contacts
 * @property \Illuminate\Database\Eloquent\Collection $solicitations
 *
 * @package ApiWebPsp\Models\Base
 */
class Receiver extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'user_id' => 'int'
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

	public function authorized_people()
	{
		return $this->hasMany(\ApiWebPsp\Models\AuthorizedPerson::class);
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
