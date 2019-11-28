<?php

namespace ApiWebPsp\Transformers;

use ApiWebPsp\Models\User;
use League\Fractal\TransformerAbstract;
use ApiWebPsp\Models\Solicitation;

/**
 * Class SolicitationTransformer.
 *
 * @package namespace ApiWebPsp\Transformers;
 */
class SolicitationTransformer extends TransformerAbstract
{
    /**
     * @var array include relationships
     */
    protected $defaultIncludes = ['patient','items','company','scheduling','address','user','attempts'];

    /**
     * Transform the Solicitation entity.
     *
     * @param \ApiWebPsp\Models\Solicitation $model
     *
     * @return array
     */
    public function transform(Solicitation $model)
    {
        return [
            'id' => $model->id,
            'protocol' => $model->protocol,
            'voucher' => $model->voucher,
            'document' => $model->document,
            'description_other_type' => $model->description_other_type,
            'type' => $model->type,
            'status' => $model->status,
            /* place your other model properties here */
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    /**
     * @param Solicitation $solicitation
     * @return \League\Fractal\Resource\Item|null
     */
    public function includeUser(Solicitation $solicitation)
    {
        return $solicitation->user ? $this->item($solicitation->user,
            new UserTransformer()) : null;
    }

    /**
     * @param Solicitation $solicitation
     * @return \League\Fractal\Resource\Collection|null
     */
    public function includeItems(Solicitation $solicitation)
    {
        return $solicitation->solicitation_items ? $this->collection($solicitation->solicitation_items,
            new SolicitationItemTransformer()) : null;
    }

    /**
     * @param Solicitation $solicitation
     * @return \League\Fractal\Resource\Collection|null
     */
    public function includeScheduling(Solicitation $solicitation)
    {
        return $solicitation->scheduling_solicitations ? $this->collection($solicitation->scheduling_solicitations,
            new SchedulingSolicitationTransformer()) : null;
    }
    /**
     * @param Solicitation $solicitation
     * @return \League\Fractal\Resource\Collection|null
     */
    public function includeAttempts(Solicitation $solicitation)
    {
        return $solicitation->attempt_solicitations ? $this->collection($solicitation->attempt_solicitations,
            new SchedulingAttemptTransformer()) : null;
    }


    /**
     * @param Solicitation $solicitation
     * @return \League\Fractal\Resource\Item|null
     */
    public function includePatient(Solicitation $solicitation)
    {
        return $solicitation->patient ? $this->item($solicitation->patient,
            new PatientTransformer()) : null;
    }

    /**
     * @param Solicitation $solicitation
     * @return \League\Fractal\Resource\Item|null
     */
    public function includeCompany(Solicitation $solicitation)
    {
        return $solicitation->company ? $this->item($solicitation->company,
            new CompanyTransformer()) : null;
    }

    /**
     * @param Solicitation $solicitation
     * @return \League\Fractal\Resource\Item|null
     */
    public function includeAddress(Solicitation $solicitation)
    {
        return $solicitation->address ? $this->item($solicitation->address,
            new AddressTransformer()) : null;
    }

    /**
     * @param string $type
     * @return string
     */
    public function humanType(string $type):string
    {
        switch ($type) {
            case 'delivery':
                return 'Entrega';
                break;
            case 'collect':
                return  'Coleta';
                break;
            case 'other':
                return 'Outro';
                break;
            case 'exchange':
                return 'Troca';
                break;
            default:
                return 'Não localizado';
                break;
        }
    }
}
