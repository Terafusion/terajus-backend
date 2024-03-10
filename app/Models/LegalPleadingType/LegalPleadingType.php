<?php

namespace App\Models\LegalPleadingType;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class LegalPleadingType.
 *
 * @package namespace App\Models\LegalPleadingType;
 */
class LegalPleadingType extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tenant_id',
        'name',
        'description',
    ];

}
