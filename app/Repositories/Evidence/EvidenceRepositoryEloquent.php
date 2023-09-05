<?php

namespace App\Repositories\Evidence;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Evidence\EvidenceRepository;
use App\Models\Evidence\Evidence;
use App\Validators\Evidence\EvidenceValidator;

/**
 * Class EvidenceRepositoryEloquent.
 *
 * @package namespace App\Repositories\Evidence;
 */
class EvidenceRepositoryEloquent extends BaseRepository implements EvidenceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Evidence::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
