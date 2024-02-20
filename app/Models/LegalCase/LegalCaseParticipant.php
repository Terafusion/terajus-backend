<?php

namespace App\Models\LegalCase;

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
 *
 * @package namespace App\Models\LegalCase;
 */
class LegalCaseParticipant extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'legal_case_id',
        'participant_type_id'
    ];

    /**
     * Get the user associated with the LegalCaseParticipant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Get the user associated with the LegalCaseParticipant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function participantType(): HasOne
    {
        return $this->hasOne(ParticipantType::class, 'id', 'participant_type_id');
    }
}
