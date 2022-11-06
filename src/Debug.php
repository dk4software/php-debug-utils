<?php

namespace Dk4software;

class Debug {

    private static $FILE_PATH = '/var/www/html/var/log/mydebug.log';

    /**
     * @param $label string
     * @param $var mixed
     * @return void
     */
    public function evaluate($label, $var = null)
    {
        $output = '#########################################' . PHP_EOL;
        $output = $output . $label;
        if ($var)
        {
            $output = $output . " : " . json_encode($var, JSON_PRETTY_PRINT);
        }
        $output = $output . PHP_EOL;
        $output = $output . '#########################################' . PHP_EOL;
        file_put_contents(self::$FILE_PATH, $output, FILE_APPEND);
    }
}