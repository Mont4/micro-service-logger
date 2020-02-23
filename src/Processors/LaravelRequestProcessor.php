<?php declare(strict_types = 1);

namespace Mont4\MicroServiceLogger\Processors;

use Monolog\Logger;
use Monolog\Processor\ProcessorInterface;

class LaravelRequestProcessor implements ProcessorInterface
{
    private        $level;
    private static $cache;

    /**
     * @param string|int $level The minimum logging level at which this Processor will be triggered
     */
    public function __construct($level = Logger::DEBUG)
    {
        $this->level = Logger::toMonologLevel($level);
    }

    public function __invoke(array $record) :array
    {
        // return if the level is not high enough
        if ($record['level'] < $this->level) {
            return $record;
        }

        $record['extra']['laravel_request'] = self::getLaravelRequest();

        return $record;
    }

    private static function getLaravelRequest() :array
    {
        if (self::$cache) {
            return self::$cache;
        }

        return self::$cache = app('request')->all();
    }
}
