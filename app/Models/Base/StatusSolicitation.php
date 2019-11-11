<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Aug 2019 15:29:03 +0000.
 */

namespace ApiWebSac\Models\Base;

use ApiWebSac\Models\Traits\UuidTrait;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StatusSolicitation
 * 
 * @property string $id
 * @property string $company_id
 * @property string $short_description
 * @property string $description
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \ApiWebSac\Models\Company $company
 * @property \Illuminate\Database\Eloquent\Collection $solicitations
 *
 * @package ApiWebSac\Models\Base
 */
class StatusSolicitation extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes, UuidTrait;

    protected $keyType = 'string';

    public $incrementing = false;

	protected $table = 'status_solicitation';

	protected $casts = [
		'company_id' => 'string',
		'id' => 'string',
	];

	public function company()
	{
		return $this->belongsTo(\ApiWebSac\Models\Company::class);
	}

	public function solicitations()
	{
		return $this->hasMany(\ApiWebSac\Models\Solicitation::class);
	}
}
