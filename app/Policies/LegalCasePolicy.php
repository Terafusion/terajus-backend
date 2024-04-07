<?php

namespace App\Policies;

use App\Models\LegalCase\LegalCase;
use App\Models\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LegalCasePolicy
{
    use HandlesAuthorization;

    public function view(User $user, LegalCase $legalCase)
    {
        if ($legalCase->tenant_id === $user->tenant_id) {
            return true;
        }

        return $legalCase->participants()->where('user_id', $user->id)->exists();
    }

    public function create(User $user)
    {
        return $user->checkHasPermission('legal_case.store');
    }

    public function update(User $user, LegalCase $legalCase)
    {
        return $user->checkHasPermission('legal_case.update') && $legalCase->tenant_id === $user->tenant_id;
    }
}
