<?php

namespace App\Models\Customer;

use App\Models\Tenant\Tenant;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Customer.
 *
 * @package namespace App\Models\Customer;
 */
class Customer extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'user_id',
        'tenant_id',
        'name',
        'email',
        'nif_number',
        'gender',
        'person_type',
        'registration_number',
        'marital_status',
        'occupation'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
