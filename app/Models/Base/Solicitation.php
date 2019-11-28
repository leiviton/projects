<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 18:32:38 +0000.
 */

namespace ApiWebPsp\Models\Base;

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
 * @property \ApiWebPsp\Models\Company $company
 * @property \ApiWebPsp\Models\Patient $patient
 * @property \ApiWebPsp\Models\Address $address
 * @property \ApiWebPsp\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $scheduling_solicitations
 * @property \Illuminate\Database\Eloquent\Collection $attempt_solicitations
 * @property \Illuminate\Database\Eloquent\Collection $solicitation_items
 *
 * @package ApiWebPsp\Models\Base
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
		return $this->belongsTo(\ApiWebPsp\Models\Company::class);
	}

	public function patient()
	{
		return $this->belongsTo(\ApiWebPsp\Models\Patient::class);
	}

    public function address()
    {
        return $this->belongsTo(\ApiWebPsp\Models\Address::class);
    }

	public function user()
	{
		return $this->belongsTo(\ApiWebPsp\Models\User::class);
	}

	public function scheduling_solicitations()
	{
		return $this->hasMany(\ApiWebPsp\Models\SchedulingSolicitation::class);
	}

	public function solicitation_items()
	{
		return $this->hasMany(\ApiWebPsp\Models\SolicitationItem::class);
	}

    public function attempt_solicitations()
    {
        return $this->hasMany(\ApiWebPsp\Models\SchedulingAttempt::class);
    }
}
