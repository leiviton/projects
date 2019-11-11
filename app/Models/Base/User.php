<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 12 Aug 2019 21:21:13 +0000.
 */

namespace ApiWebSac\Models\Base;

use ApiWebSac\Models\Traits\UuidTrait;
use Illuminate\Foundation\Auth\User as Eloquent;

/**
 * Class User
 * 
 * @property string $id
 * @property string $name
 * @property string $role
 * @property string $status
 * @property string $email
 * @property string $img_profile
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $last_login_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \ApiWebSac\Models\Company $company
 * 
 * @property \Illuminate\Database\Eloquent\Collection $patients
 *
 * @package ApiWebSac\Models\Base
 */
class User extends Eloquent
{
    use UuidTrait;

	protected $dates = [
		'email_verified_at',
		'last_login_at',
        'deleted_at',
        'created_at',
        'updated_at'
	];

	protected $casts = ['id' => 'string'];

    protected $keyType = 'string';

    public $incrementing = false;

	public function patients()
	{
		return $this->hasMany(\ApiWebSac\Models\Patient::class);
	}

    public function company()
    {
        return $this->belongsTo(\ApiWebSac\Models\Company::class);
    }
}
