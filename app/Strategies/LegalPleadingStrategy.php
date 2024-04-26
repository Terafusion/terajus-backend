<?php

namespace App\Strategies;

use App\Enums\LegalPleadingEnum;
use App\Strategies\Contracts\LegalPleadingStrategyInterface;

class LegalPleadingStrategy
{
    protected $payload;
    private LegalPleadingStrategyInterface $strategy;

    public function __construct(
        private ComplaintStrategy $complaintStrategy,
    ) {
    }

    public function resolve(string $slug, array $payload): void
    {
        $legalPleadingEnum = LegalPleadingEnum::tryFromCaseInsensitive($slug);

        $this->payload = $payload;

        $this->strategy = match ($legalPleadingEnum) {
            LegalPleadingEnum::COMPLAINT => $this->complaintStrategy,
        };
    }

    public function handle(): mixed
    {
        return $this->strategy->handle($this->payload);
    }
}