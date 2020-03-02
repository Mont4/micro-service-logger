<?php

namespace Mont4\MicroServiceLogger\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Gateway
 *
 * @package Mont4\MicroServiceLogger
 *
 * @property int    $id
 *
 * @property string $request_uuid
 * @property string $service
 *
 * @property string $token
 * @property string $user_table
 * @property string $user_id
 *
 * @property string $channel
 * @property int    $level
 * @property string $level_name
 *
 * @property string $message
 * @property array  $context
 * @property array  $extra
 *
 * @property Carbon $event_at
 *
 * ------------------------------------ Get Attributes ------------------------------------
 */
class Log extends Model
{
    public    $timestamps = false;
    protected $casts      = [
        'context' => 'json',
        'extra'   => 'json',
    ];

    // ------------------------------------ Relations ------------------------------------

    // ------------------------------------ Attributes ------------------------------------

    // ------------------------------------ Methods ------------------------------------
}
