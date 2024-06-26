<?php

namespace App\Models\Tenant;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tenancy\Identification\Concerns\AllowsTenantIdentification;
use Tenancy\Identification\Contracts\Tenant as TenancyTenant;
use Tenancy\Tenant\Events;

class Tenant extends Model implements TenancyTenant
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    use AllowsTenantIdentification;

    protected $dispatchesEvents = [
        'created' => Events\Created::class,
        'updated' => Events\Updated::class,
        'deleted' => Events\Deleted::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The attribute of the Model to use for the key.
     */
    public function getTenantKeyName(): string
    {
        return 'id';
    }

    /**
     * The actual value of the key for the tenant Model.
     */
    public function getTenantKey(): int|string
    {
        return $this->id;
    }

    /**
     * A unique identifier, eg class or table to distinguish this tenant Model.
     */
    public function getTenantIdentifier(): string
    {
        return get_class($this);
    }
}
