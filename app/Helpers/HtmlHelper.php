<?php

namespace App\Helpers;

class HtmlHelper
{
    public static function trimIAHtmlResponse(string $html)
    {
        $html = trim(str_replace('```', '', $html));
        return $html;
    }
    public static function getHtmlInitialTag(string $html)
    {
        $initialTagPosition = strpos($html, '<!DOCTYPE html>');
        $html = trim(substr($html, $initialTagPosition));

        return $html;
    }
    public static function getHtmlFinalTag(string $html)
    {
        $finalTagPosition = strrpos($html, '</html>');
        $html = trim(substr($html, 0, $finalTagPosition + strlen('</html>')));
        
        return $html;
    }
}