<?php

namespace App\Models\Document;

use App\Models\DocumentType\DocumentType;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    protected $fillable = ['file_name', 'file_path', 'model_type', 'model_id', 'user_id', 'document_type_id', 'description'];

    public function model()
    {
        return $this->morphTo();
    }

    /**
     * Get the user associated with the DocumentRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function documentType(): HasOne
    {
        return $this->hasOne(DocumentType::class, 'id', 'document_type_id');
    }
}
