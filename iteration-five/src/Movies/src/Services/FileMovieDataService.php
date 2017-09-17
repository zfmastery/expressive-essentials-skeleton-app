<?php

namespace Movies\Services;

class FileMovieDataService
{
    public function __invoke()
    {
        return include __DIR__ . '/../../../../data/movies.php';
    }
}
