<?php

namespace Dk4software;

class Debug {

    private static $FILE_PATH = '/var/www/html/var/log/mydebug.log';

    public static function evaluate($label, $var = '') {
        $output = '#########################################' . PHP_EOL;
        $output = $output . $label . " : " . json_encode($var, JSON_PRETTY_PRINT) . PHP_EOL;
        $output = $output . '#########################################' . PHP_EOL;
        file_put_contents(self::$FILE_PATH, $output, FILE_APPEND);
    }
}