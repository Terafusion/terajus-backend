<?php

namespace App\Strategies\Contracts;

use App\Models\LegalPleading\LegalPleading;
use Illuminate\Support\Facades\Validator;

interface LegalPleadingStrategyInterface
{
    public function handle(array $payload): LegalPleading;

    public function getSlug(): string;

    public function validate(array $data): mixed;
}