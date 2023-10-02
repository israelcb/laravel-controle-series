<?php

namespace App\Repositories;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Support\Facades\DB;

class EloquentEpisodesRepository implements EpisodesRepository
{
    public function markAsWatched(Season $season, array $episodes)
    {
        DB::beginTransaction();
        foreach ($season->episodes as $episode) {
            $episode->watched = false;
            $episode->save();
        }

        $watchedEpisodes = Episode::query()->whereIn('id', $episodes)->get();
        foreach ($watchedEpisodes as $episode) {
            $episode->watched = true;
            $episode->save();
        }
        DB::commit();
    }
}