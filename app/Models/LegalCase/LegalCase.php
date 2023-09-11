<?php

namespace App\Models\LegalCase;

use App\Enums\LegalCaseParticipantTypeEnum;
use App\Models\Evidence\Evidence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class LegalCase.
 *
 * @package namespace App\Models\LegalCase;
 */
class LegalCase extends Model implements Transformable
{
    use TransformableTrait, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'case_matter',
        'case_type',
        'complaint_status',
        'pending_protocol',
        'case_description',
        'case_requests',
        'plaintiff_id',
        'court',
        'fields_of_law'
    ];

    /**
     * Get all of the evidences for the LegalCase
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evidences(): HasMany
    {
        return $this->hasMany(Evidence::class, 'legal_case_id', 'id');
    }

    public function plaintiff()
    {
        return $this->hasMany(LegalCaseParticipant::class, 'legal_case_id')
            ->where('participant_type_id', LegalCaseParticipantTypeEnum::PLAINTIFF_ID); // 1 pode ser o ID do desafiante na sua tabela de tipos de participantes
    }

    public function defendant()
    {
        return $this->hasMany(LegalCaseParticipant::class, 'legal_case_id')
            ->where('participant_type_id', LegalCaseParticipantTypeEnum::DEFENDANT_ID); // 2 pode ser o ID do desafiado na sua tabela de tipos de participantes
    }
}
