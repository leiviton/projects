<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Sep 2019 15:18:31 -0300.
 */

namespace ApiWebSac\Models\Base;

use ApiWebSac\Models\Traits\UuidTrait;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SchedulingSolicitation
 * 
 * @property string $id
 * @property string $solicitation_id
 * @property \Carbon\Carbon $date_scheduling
 * @property \Carbon\Carbon $date_canceled
 * @property string $schedule_time
 * @property string $auth_contact
 * @property string $user_create
 * @property string $user_canceled
 * @property string $period
 * @property string $status
 * @property string $note
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \ApiWebSac\Models\Solicitation $solicitation
 * @property \Illuminate\Database\Eloquent\Collection $scheduling_attempts
 *
 * @package ApiWebSac\Models\Base
 */
class SchedulingSolicitation extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes, UuidTrait;
	public $incrementing = false;

	protected $dates = [
		'date_scheduling',
		'date_canceled'
	];

	public function solicitation()
	{
		return $this->belongsTo(\ApiWebSac\Models\Solicitation::class);
	}

	public function scheduling_attempts()
	{
		return $this->hasMany(\ApiWebSac\Models\SchedulingAttempt::class);
	}
}
