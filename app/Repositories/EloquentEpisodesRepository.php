<?php

namespace App\Repositories;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Support\Facades\DB;

class EloquentEpisodesRepository implements EpisodesRepository
{
    public function markAsWatched(Season $season, array $watchedEps)
    {
        DB::beginTransaction();
        $season->episodes->each(function(Episode $ep) use ($watchedEps) {
            $ep->watched = in_array($ep->id, $watchedEps);
        });
        $season->push();
        DB::commit();
    }
}