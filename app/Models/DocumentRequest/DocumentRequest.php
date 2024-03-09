<?php

namespace App\Models\DocumentRequest;

use App\Enums\DocumentRequestStatusEnum;
use App\Models\Customer\Customer;
use App\Models\DocumentRequestDoc\DocumentRequestDoc;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class DocumentRequest.
 */
class DocumentRequest extends Model implements Transformable
{
    use HasFactory, SoftDeletes, TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'customer_id',
    ];

    /**
     * Check if has pending documents that belongs to request
     */
    public function hasPendingDocumentRequestDocs()
    {
        return $this->requestedDocuments->contains(function ($documentRequestDoc) {
            return in_array($documentRequestDoc->status, [DocumentRequestStatusEnum::PENDING, DocumentRequestStatusEnum::WAITING]);
        });
    }

    /**
     * Get the user associated with the DocumentRequest
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Get the user associated with the DocumentRequest
     */
    public function customer(): HasOne
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    /**
     * Get all of the requestedDocuments for the DocumentRequest
     */
    public function requestedDocuments(): HasMany
    {
        return $this->hasMany(DocumentRequestDoc::class, 'document_request_id', 'id');
    }
}
