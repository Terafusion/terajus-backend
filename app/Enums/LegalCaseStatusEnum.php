<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static DRAFT()
 * @method static static PENDING_PROTOCOL()
 * @method static static COMPLAINT_GENERATION()
 */
final class LegalCaseStatusEnum extends Enum
{
    const DRAFT = 'DRAFT';
    const PENDING_PROTOCOL = 'PENDING_PROTOCOL';
    const COMPLAINT_GENERATION = 'COMPLAINT_GENERATION';
}
