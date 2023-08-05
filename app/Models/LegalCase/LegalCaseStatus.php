<?php

namespace App\Models\LegalCase;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class LegalCaseStatus.
 *
 * @package namespace App\Models\LegalCase;
 */
class LegalCaseStatus extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'legal_case_id'
    ];
}
