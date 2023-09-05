<?php

namespace App\Models\LegalCase;

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
}
