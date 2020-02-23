<?php

namespace Mont4\MicroServiceLogger;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Mont4\MicroServiceLogger\Jobs\LogToDBJob;

/**
 * Class LogHandler
 *
 * @package danielme85\LaravelLogToDB
 */
class LogHandler extends AbstractProcessingHandler
{
    /**
     * Writes the record down to the log of the implementing handler
     *
     * @param array $record
     */
    protected function write(array $record) :void
    {
        $config = config('micro_service_logger');

        try {
            if ($config['queue_enable']) {
                dispatch(new LogToDBJob($record))
                    ->onConnection($config['queue_connection'])
                    ->onQueue($config['queue_name']);
            } else {
                dispatch_now(new LogToDBJob($record));
            }
        } catch (\Exception $ex) {
            \Log::channel('single')->emergency($ex);
        }
    }
}
