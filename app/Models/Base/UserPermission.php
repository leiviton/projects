<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Nov 2019 16:38:19 -0200.
 */

namespace ApiWebSac\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserPermission
 * 
 * @property int $id
 * @property string $user_id
 * @property int $permission_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \ApiWebSac\Models\Permission $permission
 * @property \ApiWebSac\Models\User $user
 *
 * @package ApiWebSac\Models\Base
 */
class UserPermission extends Eloquent
{
	protected $casts = [
		'permission_id' => 'int'
	];

	public function permission()
	{
		return $this->belongsTo(\ApiWebSac\Models\Permission::class);
	}

	public function user()
	{
		return $this->belongsTo(\ApiWebSac\Models\User::class);
	}
}
