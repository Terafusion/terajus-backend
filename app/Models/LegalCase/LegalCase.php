<?php

namespace App\Models\LegalCase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'plaintiff_id'
    ];
}
