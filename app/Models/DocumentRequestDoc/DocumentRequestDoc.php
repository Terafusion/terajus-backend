<?php

namespace App\Models\DocumentRequestDoc;

use App\Enums\DocumentRequestStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class DocumentRequestDoc.
 *
 * @package namespace App\Models\DocumentRequestDoc;
 */
class DocumentRequestDoc extends Model implements Transformable
{
    use TransformableTrait;

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
    ];

    protected $attributes = [
        'status' => DocumentRequestStatusEnum::PENDING,
    ];
}
