<?php

namespace ApiWebPsp\Transformers;

use League\Fractal\TransformerAbstract;
use ApiWebPsp\Models\Patient;

/**
 * Class PatientTransformer.
 *
 * @package namespace ApiWebPsp\Transformers;
 */
class PatientTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['address','contact'];

    /**
     * Transform the Patient entity.
     *
     * @param \ApiWebPsp\Models\Patient $model
     *
     * @return array
     */
    public function transform(Patient $model)
    {
        return [
            'id'         => $model->id,
            'name' => $model->name,
            'cpf' => $model->cpf,
            'cpf_verify' => $model->cpf_verify,
            'date_birth' => $model->date_birth,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    /**
     * @param Patient $patient
     * @return \League\Fractal\Resource\Collection|null
     */
    public function includeAddress(Patient $patient)
    {
        return $patient->addresses ? $this->collection($patient->addresses, new AddressTransformer()) : null;
    }

    /**
     * @param Patient $patient
     * @return \League\Fractal\Resource\Collection|null
     */
    public function includeContact(Patient $patient)
    {
        return $patient->patient_contacts ? $this->collection($patient->patient_contacts, new PatientContactTransformer()) : null;
    }
}
