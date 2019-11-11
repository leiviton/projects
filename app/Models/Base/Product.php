<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 16 Aug 2019 19:02:12 +0000.
 */

namespace ApiWebSac\Models\Base;

use ApiWebSac\Models\Traits\UuidTrait;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Product
 * 
 * @property string $id
 * @property string $company_id
 * @property string $active_principle
 * @property string $cnpj
 * @property string $laboratory
 * @property string $ggrem
 * @property string $registry
 * @property string $ean
 * @property string $product
 * @property string $presentation
 * @property string $information
 * @property string $manifestation
 * @property string $discontinued
 * @property \Carbon\Carbon $release_date
 * @property string $code_protheus
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \ApiWebSac\Models\Company $company
 *
 * @package ApiWebSac\Models\Base
 */
class Product extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes, UuidTrait;

    protected $keyType = 'string';

    public $incrementing = false;

	protected $casts = [
		'company_id' => 'string',
        'id' => 'string'
	];

	protected $dates = [
		'release_date',
        'created_at',
        'updated_at',
        'deleted_at'
	];

	public function company()
	{
		return $this->belongsTo(\ApiWebSac\Models\Company::class);
	}
}
