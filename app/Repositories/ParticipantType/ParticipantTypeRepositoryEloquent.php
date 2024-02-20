<?php

namespace App\Repositories\ParticipantType;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ParticipantType\ParticipantTypeRepository;
use App\Models\ParticipantType\ParticipantType;
use App\Validators\ParticipantType\ParticipantTypeValidator;

/**
 * Class ParticipantTypeRepositoryEloquent.
 *
 * @package namespace App\Repositories\ParticipantType;
 */
class ParticipantTypeRepositoryEloquent extends BaseRepository implements ParticipantTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ParticipantType::class;
    } 

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
