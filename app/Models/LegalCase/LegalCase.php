<?php

namespace App\Models\LegalCase;

use App\Enums\LegalCaseParticipantTypeEnum;
use App\Enums\LegalCaseStatusEnum;
use App\Models\Evidence\Evidence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class LegalCase.
 *
 * @package namespace App\Models\LegalCase;
 */
class LegalCase extends Model implements Transformable
{
    use TransformableTrait, HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'case_matter',
        'case_type',
        'pending_protocol',
        'case_description',
        'case_requests',
        'court',
        'fields_of_law',
        'complaint',
        'status'
    ];

    protected $attributes = [
        'status' => LegalCaseStatusEnum::DRAFT,
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

    /**
     * Get all of the participants for the LegalCase
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function participants()
    {
        return $this->hasMany(LegalCaseParticipant::class);
    }

    /**
     * Get all of the plaintiffs for the LegalCase
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plaintiff()
    {
        return $this->hasMany(LegalCaseParticipant::class, 'legal_case_id')
            ->where('participant_type_id', LegalCaseParticipantTypeEnum::PLAINTIFF_ID); // 1 pode ser o ID do desafiante na sua tabela de tipos de participantes
    }

    /**
     * Get all of the defendants for the LegalCase
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function defendant()
    {
        return $this->hasMany(LegalCaseParticipant::class, 'legal_case_id')
            ->where('participant_type_id', LegalCaseParticipantTypeEnum::DEFENDANT_ID); // 2 pode ser o ID do desafiado na sua tabela de tipos de participantes
    }
}
