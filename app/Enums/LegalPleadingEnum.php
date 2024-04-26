<?php

namespace App\Enums;

class LegalPleadingEnum {
    public const COMPLAINT = 'COMPLAINT';

    public static function tryFromCaseInsensitive(string $value) 
    {
        return match (strtolower($value)) {
            'complaint' => self::COMPLAINT,
        };
    }
}