<?php

namespace App\Events;

use App\Entity\Movie;
use Symfony\Contracts\EventDispatcher\Event;

class ImportMovieEvent extends Event
{
    public function __construct(
        private readonly Movie $movie
    ) {
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }
}
