<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Sep 2019 15:17:05 -0300.
 */

namespace ApiWebSac\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SchedulingAttempt
 * 
 * @property int $id
 * @property string $phone
 * @property string $reason
 * @property string $sms
 * @property string $success
 * @property string $scheduling_solicitation_id
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \ApiWebSac\Models\Solicitation $solicitation
 * @property \ApiWebSac\Models\User $user
 *
 * @package ApiWebSac\Models\Base
 */
class SchedulingAttempt extends Eloquent
{
	public function solicitation()
	{
		return $this->belongsTo(\ApiWebSac\Models\Solicitation::class);
	}

	public function user()
	{
		return $this->belongsTo(\ApiWebSac\Models\User::class);
	}
}
