<?php

namespace Dk4software;

class Debug {

    public static function evaluate($label, $var) {
        $output = $label . json_encode($var, JSON_PRETTY_PRINT) . PHP_EOL;
        $output = $output . '--------------------------------------------' . PHP_EOL;
        file_put_contents('/var/www/html/var/log/mydebug.log', $output, FILE_APPEND);
    }
}