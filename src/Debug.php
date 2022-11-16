<?php

namespace Dk4software;

class Debug {

    private $logPath;

    private function __construct($logPath)
    {
        $this->logPath = $logPath;
    }

    public static function instance($path = '/var/www/html/var/log/mydebug.log')
    {
        return new Debug($path);
    }

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
        file_put_contents($this->logPath, $output, FILE_APPEND);
    }

    public function trace()
    {
        $e = new \Exception();
        $this->evaluate('Stack Trace', $e->getTraceAsString());
    }
}

//Debug::instance('./debug.log')->trace();
