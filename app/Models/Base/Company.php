<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Aug 2019 15:30:22 +0000.
 */

namespace ApiWebPsp\Models\Base;

use ApiWebPsp\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Company
 * 
 * @property int $id
 * @property string $cnpj
 * @property string $name
 * @property string $contact_name
 * @property string $phone
 * @property string $email
 * @property string $logo
 * @property int $fiscal
 * @property string $status
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property \Illuminate\Database\Eloquent\Collection $solicitations
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package ApiWebPsp\Models\Base
 */
class Company extends Eloquent
{
	use SoftDeletes;

	protected $casts = [
		'fiscal' => 'int',
        'id' => 'int'
	];

    public function products()
	{
		return $this->hasMany(\ApiWebPsp\Models\Product::class);
	}

	public function solicitations()
	{
		return $this->hasMany(\ApiWebPsp\Models\Solicitation::class);
	}

	public function users()
	{
		return $this->hasMany(\ApiWebPsp\Models\User::class);
	}
}
