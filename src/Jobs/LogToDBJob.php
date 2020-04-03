<?php

namespace Mont4\MicroServiceLogger\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mont4\MicroServiceLogger\Models\Log;

class LogToDBJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $record;
    private $request_uuid;

    private $token;
    private $userTable;
    private $userId;

    /**
     * Create a new job instance.
     *
     * @param $record
     */
    public function __construct($record)
    {
        $this->request_uuid = app('request')->headers->get('logger_uuid');
        $this->record       = $record;

        $this->token     = str_replace('Bearer ', '', app('request')->headers->get('Authorization'));
        
        if ($user = auth()->user()) {
            $this->userTable = $user->getTable();
            $this->userId    = $user->getAuthIdentifier();
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->mysql();
    }

    protected function mysql() :void
    {
        $config = config('micro_service_logger');

        $log = new Log();
        $log->setConnection($config['db_connection']);

        $log->request_uuid = $this->request_uuid;
        $log->service      = $config['service_name'];

        $log->token      = $this->token;
        $log->user_table = $this->userTable;
        $log->user_id    = $this->userId;

        $log->channel    = $this->record['channel'];
        $log->level      = $this->record['level'];
        $log->level_name = $this->record['level_name'];

        $log->message = $this->record['message'];
        $log->extra   = $this->record['extra'];
        if ($config['details'])
            $log->context = $this->record['context'];

        $log->event_at = $this->record['datetime'];

        $log->save();
    }
}
