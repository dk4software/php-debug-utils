<?php

declare(strict_types = 1);

namespace Dk4software;

class Debug {

    /**
     * @var String $logPath
     */
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
     * @param $var mixed
     * @return void
     */
    public function evaluate(mixed $var, string $label = null):void
    {
        $output = '#########################################' . PHP_EOL;
        if($label) $output = $output . $label . ' : ';
        $output = $output . json_encode($var, JSON_PRETTY_PRINT);
        $output = $output . PHP_EOL;
        $output = $output . '#########################################' . PHP_EOL;
        file_put_contents($this->logPath, $output, FILE_APPEND);
    }

    /**
     * @return void
     */
    public function trace(): void
    {
        $e = new \Exception();
        $this->evaluate('Stack Trace', $e->getTraceAsString());
    }

    /**
     * @param $msg string
     * @return void
     */
    public function log(string $msg):void
    {
        $output = '#########################################' . PHP_EOL;
        $output = $output . $var;
        $output = $output . PHP_EOL;
        $output = $output . '#########################################' . PHP_EOL;
        file_put_contents($this->logPath, $output, FILE_APPEND);
    }
}

// $fruits = ["Apple", "Orange", "Grapes"];
// Debug::instance('./debug.log')->evaluate($fruits, '$fruits');
