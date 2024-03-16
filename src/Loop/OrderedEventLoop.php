<?php

namespace PHPNative\Loop;

use PHPNative\Event\EventType;

class OrderedEventLoop extends EventLoop
{

    public Timer $render;

    public Timer $updates;

    public function __construct(private \PHPNative\Driver\Event $event)
    {

        $this->render = new Timer(self::DEFAULT_FRAME_RATE);
        $this->updates = new Timer(self::DEFAULT_UPDATE_RATE);
    }

    protected function execute(int $frameRate, int $updateRate): void
    {
        $this->render->rate($frameRate)->touch();
        $this->updates->rate($updateRate)->touch();

        while ($this->running) {
            $now = \microtime(true);

            if (($delta = $this->updates->next($now)) !== null) {
                $this->update($delta);
            }

            if (($delta = $this->render->next($now)) !== null) {
                $this->render($delta);
            }

            while ($event = $this->event->pollEvent()) {
                if($event->getType() == EventType::NOOP) break;
                $this->poll($event);
            }
        }
    }
}