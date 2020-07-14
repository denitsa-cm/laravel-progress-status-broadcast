<?php

namespace DenitsaCm\ProgressStatusBroadcast;

use DenitsaCm\ProgressStatusBroadcast\Events\ProgressEvent;
use Illuminate\Broadcasting\Channel;

class ProgressStatusBroadcast
{
    private int $total = 0;
    private ?Channel $broadcastChannel;
    private string $broadcastAs = 'progress';

    public function broadcastOn(Channel $channel)
    {
        $this->broadcastChannel = $channel;
        return $this;
    }

    public function total(int $total)
    {
        $this->total = $total;
        return $this;
    }

    public function progress(int $current)
    {
        $currentProgress = (100 / $this->total) * $current;
        broadcast($this->progressEvent($currentProgress));
        return $this;
    }

    public function broadcastAs(string $broadcastAs)
    {
        $this->broadcastAs = $broadcastAs;
        return $this;
    }

    private function progressEvent(int $currentProgress)
    {
        $progressEvent = new ProgressEvent($currentProgress);
        $progressEvent->setBroadcastChannel($this->broadcastChannel);
        $progressEvent->setBroadcastAs($this->broadcastAs);

        return $progressEvent;
    }
}
