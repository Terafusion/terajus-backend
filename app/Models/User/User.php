<?php

namespace App\Models\User;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'name',
        'email',
        'password',
        'nif_number',
        'registration_number',
        'marital_status',
        'occupation',
        'gender',
        'address',
        'person_type',
    ];

    public function setPasswordAttribute($attribute)
    {
        $this->attributes['password'] = Hash::make($attribute);
    }

    public function professionals()
    {
        return $this->belongsToMany(User::class, 'customer_professionals', 'customer_id', 'professional_id');
    }

    public function customers()
    {
        return $this->belongsToMany(User::class, 'customer_professionals', 'professional_id', 'customer_id');
    }
    
    public function checkHasPermission(string $name) : bool
    {
        return $this->roles->pluck('permissions')->flatten()->contains('name', $name);  
    }
}
