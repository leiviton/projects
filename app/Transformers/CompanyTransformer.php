<?php

namespace ApiWebSac\Transformers;

use League\Fractal\TransformerAbstract;
use ApiWebSac\Models\Company;

/**
 * Class CompanyTransformer.
 *
 * @package namespace ApiWebSac\Transformers;
 */
class CompanyTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['products'];

    /**
     * Transform the Company entity.
     *
     * @param \ApiWebSac\Models\Company $model
     *
     * @return array
     */
    public function transform(Company $model)
    {
        return [
            'id' => $model->id,
            'cnpj' => $model->cnpj,
            'name' => $model->name,
            'email' => $model->email,
            'phone' => $model->phone,
            'contact_name' => $model->contact_name,
            'logo' => env('APP_URL') . '/storage/companies/' . $model->logo,
            'status' => $model->status,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeProducts(Company $model) {
        return $this->collection($model->products, new ProductTransformer());
    }
}
