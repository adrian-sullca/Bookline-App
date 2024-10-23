<?php

namespace App\Helpers;

class Validator
{
    public static function passwordRegexOk($password)
    {
        $pattern = '/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
        return preg_match($pattern, $password);
    }

    public static function phoneNumberRegexOk($phoneNumber)
    {
        $pattern = '/^\d{9}$/';
        return preg_match($pattern, $phoneNumber);
    }

    public static function imageTypeOk($file)
    {
        /* $type = $file['type'];
        if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png') {
            $path = __DIR__ . '/../../Public/Assets/img';
            if (!is_dir($path)) {
                mkdir($path, 0777);
            }
            return true;
        }
        return false; */
        $validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (in_array($file['type'], $validTypes)) {
            return true;
        }
        return false;
    }
}
