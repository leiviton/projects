<?php

namespace ApiWebSac\Models;

use OwenIt\Auditing\Contracts\Auditable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SolicitationItem.
 *
 * @package namespace ApiWebSac\Models;
 */
class SolicitationItem extends \ApiWebSac\Models\Base\SolicitationItem implements Transformable,Auditable
{
    use TransformableTrait;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'solicitation_id',
        'total',
        'price_unitary',
        'qtd',
        'lot',
        'pen',
        'expiration_date',
        'item_type'
    ];
}
