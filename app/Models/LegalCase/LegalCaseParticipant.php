<?php

namespace App\Models\LegalCase;

use App\Models\Customer\Customer;
use App\Models\ParticipantType\ParticipantType;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class LegalCaseParticipant.
 */
class LegalCaseParticipant extends Model implements Transformable
{
    use HasFactory;
    use SoftDeletes;
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'legal_case_id',
        'participant_type_id',
    ];

    /**
     * Get the user associated with the LegalCaseParticipant
     */
    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    /**
     * Get the user associated with the LegalCaseParticipant
     */
    public function legalCase(): HasOne
    {
        return $this->hasOne(LegalCase::class, 'id', 'legal_case_id');
    }

    /**
     * Get the user associated with the LegalCaseParticipant
     */
    public function participantType(): HasOne
    {
        return $this->hasOne(ParticipantType::class, 'id', 'participant_type_id');
    }
}
