<?php

namespace App\Models\DocumentRequestDoc;

use App\Enums\DocumentRequestStatusEnum;
use App\Models\Document\Document;
use App\Models\DocumentType\DocumentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class DocumentRequestDoc.
 *
 * @package namespace App\Models\DocumentRequestDoc;
 */
class DocumentRequestDoc extends Model implements Transformable
{
    use TransformableTrait, HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'document_request_id',
        'document_id',
        'document_type_id',
        'status',
        'description',
    ];

    protected $attributes = [
        'status' => DocumentRequestStatusEnum::PENDING,
    ];

    public function documentType()
    {
        return $this->hasOne(DocumentType::class, 'id', 'document_type_id');
    }

    public function documents()
    {
        return $this->morphMany(Document::class, 'model');
    }
}
