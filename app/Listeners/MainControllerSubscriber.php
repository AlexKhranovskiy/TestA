<?php

namespace App\Listeners;

use App\Events\LocationStoreEvent;
use App\Services\DBHandler\DBHandlerinterface;

class MainControllerSubscriber
{
    private $DBHandler;

    public function __construct(DBHandlerinterface $DBHandler)
    {
        $this->DBHandler = $DBHandler;
    }

    public function handleStoreLocation($event)
    {
        $this->DBHandler
            ->storeLocation($event->locationResponseData, $event->latitude, $event->longitude);
    }

    public function subscribe($events)
    {
        $events->listen(
            LocationStoreEvent::class,
            [MainControllerSubscriber::class, 'handleStoreLocation']
        );
    }
}
