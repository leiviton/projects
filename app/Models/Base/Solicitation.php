<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Aug 2019 18:32:38 +0000.
 */

namespace ApiWebSac\Models\Base;

use ApiWebSac\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Solicitation
 * 
 * @property string $id
 * @property string $company_id
 * @property string $patient_id
 * @property string $address_id
 * @property string $user_id
 * @property string $status_solicitation_id
 * @property string $protocol
 * @property string $manifestation
 * @property string $description_other_type
 * @property \Carbon\Carbon $date_scheduling
 * @property string $schedule_time
 * @property string $type
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \ApiWebSac\Models\Company $company
 * @property \ApiWebSac\Models\Patient $patient
 * @property \ApiWebSac\Models\Address $address
 * @property \ApiWebSac\Models\StatusSolicitation $status_solicitation
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

	public $incrementing = false;

	protected $dates = [
		'date_scheduling'
	];

	protected $casts = [
	    'status_solicitation_id' => 'string'
    ];

	protected static function boot()
    {
        parent::boot();

        static::creating(function ($obj) {
            $obj->id = Uuid::uuid4();
            $obj->status_solicitation_id = DB::table('status_solicitation')->where('short_description','Chamado Novo')->first()->id;
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

	public function status_solicitation()
	{
		return $this->belongsTo(\ApiWebSac\Models\StatusSolicitation::class);
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
