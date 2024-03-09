<?php

namespace App\Repositories\CustomerProfessional;

use App\Models\CustomerProfessional\CustomerProfessional;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CustomerProfessionalRepositoryEloquent.
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
