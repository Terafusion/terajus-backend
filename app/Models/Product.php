<?php

namespace App\Models;

use App\Models\LegalCase\LegalCase;
use App\Models\LegalCase\LegalCaseParticipant;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class Product.
 *
 * @package namespace App\Models\Product;
 */
class Product extends Model 
{

    use TransformableTrait;
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
   
    ];

  

}
