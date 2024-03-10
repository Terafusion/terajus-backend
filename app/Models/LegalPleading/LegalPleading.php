<?php

namespace App\Models\LegalPleading;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class LegalPleading.
 *
 * @package namespace App\Models\LegalPleading;
 */
class LegalPleading extends Model implements Transformable
{
    use TransformableTrait, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'fields_of_law',
        'legal_case_id',
        'legal_case_id',
        'legal_pleading_type_id',
        'tenant_id',
        'context',
        'content',
        'status',
    ];
}
