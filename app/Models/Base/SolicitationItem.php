<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Aug 2019 15:29:16 +0000.
 */

namespace ApiWebSac\Models\Base;

use ApiWebSac\Models\Traits\UuidTrait;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SolicitationItem
 * 
 * @property string $id
 * @property string $product_id
 * @property string $solicitation_id
 * @property float $total
 * @property float $price_unitary
 * @property int $qtd
 * @property string $lot
 * @property string $pen
 * @property string $item_type
 * @property \Carbon\Carbon expiration_date
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \ApiWebSac\Models\Product $product
 * @property \ApiWebSac\Models\Solicitation $solicitation
 *
 * @package ApiWebSac\Models\Base
 */
class SolicitationItem extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes, UuidTrait;

    protected $keyType = 'string';

    public $incrementing = false;

	protected $casts = [
		'product_id' => 'string',
		'solicitation_id' => 'string',
		'total' => 'float',
		'price_unitary' => 'float',
		'qtd' => 'int'
	];

	protected $dates = [
	  'expiration_date'
    ];

	public function product()
	{
		return $this->belongsTo(\ApiWebSac\Models\Product::class);
	}

	public function solicitation()
	{
		return $this->belongsTo(\ApiWebSac\Models\Solicitation::class);
	}
}
