<?php

namespace App\Models\Document;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Document.
 *
 * @package namespace App\Models\Document;
 */
class Document extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['file_name', 'file_path', 'model_type', 'model_id'];

    public function model()
    {
        return $this->morphTo();
    }
}
