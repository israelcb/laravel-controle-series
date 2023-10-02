<?php

namespace App\Repositories;

use App\Models\Season;

interface EpisodesRepository
{
    public function markAsWatched(Season $season, array $watchedEps);
}