<?php

namespace Mont4\MicroServiceLogger;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/micro_service_logger.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('micro_service_logger.php'),
        ], 'MicroServiceLogger');

        if (!class_exists('CreateLogTable')) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__ . '/../database/migrations/create_logs_table.php.stub' => $this->app->databasePath() . "/migrations/{$timestamp}_create_logs_table.php",
            ], 'MicroServiceLogger');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'micro_service_logger'
        );
    }

}
