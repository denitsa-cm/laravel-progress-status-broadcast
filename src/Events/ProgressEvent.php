<?php
declare(strict_types=1);

namespace DenitsaCm\ProgressStatusBroadcast\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class ProgressEvent implements ShouldBroadcastNow
{
    private Channel $broadcastChannel;
    public int $progress = 0;
    public string $message = '';
    private string $broadcastAs = 'progress';

    /**
     * ProgressEvent constructor.
     *
     * @param int $total
     * @param int $progress
     */
    public function __construct(int $progress)
    {
        $this->progress = $progress;
        $this->message = "Progress status";
    }

    public function setBroadcastChannel(Channel $channel)
    {
        $this->broadcastChannel = $channel;
        return $this;
    }

    public function setBroadcastAs(string $broadcastAs)
    {
        $this->broadcastAs = $broadcastAs;
        return $this;
    }

    public function broadcastOn()
    {
        return $this->broadcastChannel ?? new Channel('progress');
    }

    public function broadcastAs()
    {
        return $this->broadcastAs;
    }
}