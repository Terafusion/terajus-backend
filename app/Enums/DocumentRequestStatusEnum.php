<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PENDING()
 * @method static static FINISHED()
 * @method static static COMPLAINT_GENERATION()
 */
final class DocumentRequestStatusEnum extends Enum
{
    const PENDING = 'PENDING';
    const FINISHED = 'FINISHED';
}
