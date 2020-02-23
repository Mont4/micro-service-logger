<?php

namespace Mont4\MicroServiceLogger\Formatter;

class CustomizeFormatter
{
    public function __invoke($logger)
    {
        $this->config = config('micro_service_logger');

        foreach ($logger->getHandlers() as $handler) {
            foreach ($this->config['processors'] as $processorName) {
                if (class_exists($processorName)) {
                    $handler->pushProcessor(new $processorName);
                }
            }
        }
    }
}
