<?php

namespace Ivan\Lan;

class Helper
{
    public static function isValid(string $token): bool
    {
        return (md5($token) === 'f8c0c0c6e004586d6009a350ebdec4dc');
    }
    public static function validateString(string $value): string
    {
        return strip_tags($value);
    }
}