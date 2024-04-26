<?php

namespace App\Models\LegalPleading;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class LegalPleading.
 */
class LegalPleading extends Model implements Transformable
{
    use HasFactory, TransformableTrait;
    protected $connection = 'mongodb';
    protected $collection = 'legal_pleadings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tenant_id',
        'uuid',
        'slug',
        'court',
        'fields_of_law',
        'content',
        'lawyers',
        'plaintiffs',
        'defendants',
        'legal_pleading_word_count',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
