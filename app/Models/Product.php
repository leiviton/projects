<?php

namespace ApiWebSac\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product.
 *
 * @package namespace ApiWebSac\Models;
 */
class Product extends \ApiWebSac\Models\Base\Product implements Transformable,Auditable
{
    use TransformableTrait;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'active_principle',
        'cnpj',
        'laboratory',
        'ggrem',
        'registry',
        'ean',
        'product',
        'presentation',
        'information',
        'manifestation',
        'discontinued',
        'release_date',
        'code_protheus'
    ];

}
