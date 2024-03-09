<?php

namespace App\Models\User;

use App\Models\Address\Address;
use App\Models\LegalCase\LegalCase;
use App\Models\LegalCase\LegalCaseParticipant;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\Access\Authorizable as AccessAuthorizable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 */
class User extends Model implements AuthAuthenticatable, Authorizable
{
    use AccessAuthorizable;
    use Authenticatable;
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nif_number',
        'registration_number',
        'marital_status',
        'occupation',
        'gender',
        'person_type',
    ];

    public function setPasswordAttribute($attribute)
    {
        $this->attributes['password'] = Hash::make($attribute);
    }

    public function address()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function professionals()
    {
        return $this->belongsToMany(User::class, 'customer_professionals', 'customer_id', 'professional_id');
    }

    public function customers()
    {
        return $this->belongsToMany(User::class, 'customer_professionals', 'professional_id', 'customer_id');
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
