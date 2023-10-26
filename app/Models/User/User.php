<?php

namespace App\Models\User;

use App\Models\Address\Address;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 *
 * @package namespace App\Models\User;
 */
class User extends Model implements AuthAuthenticatable
{
    use TransformableTrait;
    use HasFactory;
    use HasApiTokens;
    use Authenticatable;
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
        'person_type',
    ];

    public function setPasswordAttribute($attribute)
    {
        $this->attributes['password'] = Hash::make($attribute);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
