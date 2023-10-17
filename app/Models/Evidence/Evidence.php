<?php

namespace App\Models\Evidence;

use App\Models\Document\Document;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Evidence.
 *
 * @package namespace App\Models\Evidence;
 */
class Evidence extends Model implements Transformable
{
    use TransformableTrait;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'evidences';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'legal_case_reference',
        'legal_case_id'
    ];

    public function documents()
    {
        return $this->morphMany(Document::class, 'model');
    }
}
