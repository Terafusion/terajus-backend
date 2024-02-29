<?php

namespace App\Repositories\CustomerProfessional;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CustomerProfessional\CustomerProfessionalRepository;
use App\Models\CustomerProfessional\CustomerProfessional;
use App\Validators\CustomerProfessionalValidator;

/**
 * Class CustomerProfessionalRepositoryEloquent.
 *
 * @package namespace App\Repositories\CustomerProfessional;
 */
class CustomerProfessionalRepositoryEloquent extends BaseRepository implements CustomerProfessionalRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CustomerProfessional::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
