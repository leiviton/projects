<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 18:32:38 +0000.
 */

namespace ApiWebSac\Models\Base;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Solicitation
 * 
 * @property string $id
 * @property int $company_id
 * @property int $patient_id
 * @property int $address_id
 * @property int $user_id
 * @property string $protocol
 * @property string $manifestation
 * @property string $description_other_type
 * @property string $type
 * @property string $deleted_at
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \ApiWebSac\Models\Company $company
 * @property \ApiWebSac\Models\Patient $patient
 * @property \ApiWebSac\Models\Address $address
 * @property \ApiWebSac\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $scheduling_solicitations
 * @property \Illuminate\Database\Eloquent\Collection $attempt_solicitations
 * @property \Illuminate\Database\Eloquent\Collection $solicitation_items
 *
 * @package ApiWebSac\Models\Base
 */
class Solicitation extends Eloquent
{
	use SoftDeletes;

	protected static function boot()
    {
        parent::boot();

        static::creating(function ($obj) {
            $obj->id = Uuid::uuid4();
            $obj->company_id = DB::table('companies')->first()->id;
        });
    }

    public function company()
	{
		return $this->belongsTo(\ApiWebSac\Models\Company::class);
	}

	public function patient()
	{
		return $this->belongsTo(\ApiWebSac\Models\Patient::class);
	}

    public function address()
    {
        return $this->belongsTo(\ApiWebSac\Models\Address::class);
    }

	public function user()
	{
		return $this->belongsTo(\ApiWebSac\Models\User::class);
	}

	public function scheduling_solicitations()
	{
		return $this->hasMany(\ApiWebSac\Models\SchedulingSolicitation::class);
	}

	public function solicitation_items()
	{
		return $this->hasMany(\ApiWebSac\Models\SolicitationItem::class);
	}

    public function attempt_solicitations()
    {
        return $this->hasMany(\ApiWebSac\Models\SchedulingAttempt::class);
    }
}
