<?php

namespace App\Models\LegalCase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class LegalCasesParticipant.
 *
 * @package namespace App\Models\LegalCase;
 */
class LegalCasesParticipant extends Model implements Transformable
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
}
