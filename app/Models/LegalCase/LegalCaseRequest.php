<?php

namespace App\Models\LegalCase;

use Jenssegers\Mongodb\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class LegalCaseRequest.
 *
 * @package namespace App\Models\LegalCase;
 */
class LegalCaseRequest extends Model implements Transformable
{
    use TransformableTrait;

    protected $connection = 'mongodb'; // Specify the MongoDB connection
    protected $collection = 'legal_case_requests'; // Specify the MongoDB connection


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', // Solicitante
        'tenant_id',
        'number', // Número do processo
        'uuid', // UUID único
        'resume', // JSON com as informações do processo
        'historic', // Movimentações do processo
    ];

}
