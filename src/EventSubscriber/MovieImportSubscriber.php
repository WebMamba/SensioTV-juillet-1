<?php

namespace App\EventSubscriber;

use App\Events\ImportMovieEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MovieImportSubscriber implements EventSubscriberInterface
{
    public function onMovieImport(ImportMovieEvent $event): void
    {

    }

    public static function getSubscribedEvents(): array
    {
        return [
           ImportMovieEvent::class => 'onMovieImport',
        ];
    }
}
