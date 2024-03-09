<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Traits\TransformableTrait;

class Address extends Model
{
    use HasFactory, SoftDeletes, TransformableTrait;

    protected $fillable = [
        'street',
        'number',
        'district',
        'city',
        'state',
        'country',
        'complement',
        'zip_code',
        'addressable_id',
        'addressable_type',
        'user_id',
    ];

    public function addressable()
    {
        return $this->morphTo();
    }
}
