<?php

namespace Mont4\MicroServiceLogger;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;

/**
 * Class LogToDbHandler
 *
 * @package Mont4\MicroServiceLogger
 */
class LogToDbHandler extends AbstractProcessingHandler
{
    /**
     * LogToDbHandler constructor.
     *
     * @param array $config     Logging configuration from logging.php
     * @param array $processors collection of log processors
     * @param bool  $bubble     Whether the messages that are handled can bubble up the stack or not
     */
    function __construct(array $config, array $processors, bool $bubble = true)
    {
        $level = Logger::DEBUG;

        foreach ($processors as $processor) {
            $this->pushProcessor($processor);
        }

        parent::__construct($level, $bubble);
    }

    /**
     * Write the Log
     *
     * @param array $record
     */
    protected function write(array $record) :void
    {
        \Log::info($record);
    }
}
