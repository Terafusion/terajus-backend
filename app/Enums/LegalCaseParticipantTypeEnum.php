<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static PLAINTIFF()
 * @method static static DEFENDANT()
 * @method static static COMPLAINT_GENERATION()
 */
final class LegalCaseParticipantTypeEnum extends Enum
{
    const PLAINTIFF_ID = 1;

    const DEFENDANT_ID = 2;
}
