<?php

namespace DenitsaCm\ProgressStatusBroadcast\Facades;

use Illuminate\Support\Facades\Facade;

class ProgressStatusBroadcast extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'progress-status-broadcast';
    }
}
