<?php

namespace App\Models\User;

use App\Models\LegalCase\LegalCase;
use App\Models\LegalCase\LegalCaseParticipant;
use App\Models\Tenant\Tenant as TenantModel;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\Access\Authorizable as AccessAuthorizable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 *
 * @package namespace App\Models\User;
 */
class User extends Model implements AuthAuthenticatable, Authorizable
{
    use Authenticatable;
    use AccessAuthorizable;
    use TransformableTrait;
    use HasFactory;
    use HasApiTokens;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'nif_number', 'password', 'person_type', 'gender', 'is_tenant', 'tenant_id'
    ];

    public function isTenant(): bool
    {
        return $this->is_tenant;
    }
    public function tenant(): HasOne
    {
        return $this->hasOne(TenantModel::class);
    }

    public function managedTenant(): BelongsTo
    {
        return $this->belongsTo(TenantModel::class, 'user_id');
    }

    public function setPasswordAttribute($attribute)
    {
        $this->attributes['password'] = Hash::make($attribute);
    }

    public function checkHasPermission(string $name): bool
    {
        return $this->roles->pluck('permissions')->flatten()->contains('name', $name);
    }

    public function legalCases(): HasMany
    {
        return $this->hasMany(LegalCase::class, 'user_id', 'id');
    }

    public function legalCaseParticipations(): HasMany
    {
        return $this->hasMany(LegalCaseParticipant::class);
    }
}
