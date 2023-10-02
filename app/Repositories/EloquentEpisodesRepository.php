<?php

namespace App\Repositories;

use App\Models\Season;
use Illuminate\Support\Facades\DB;

class EloquentEpisodesRepository implements EpisodesRepository
{
    public function markAsWatched(Season $season, array $watchedEps)
    {
        DB::beginTransaction();
        $season->episodes()->whereNotIn('id', $watchedEps)->update([
            'watched' => false,
        ]);

        $season->episodes()->whereIn('id', $watchedEps)->update([
            'watched' => true,
        ]);
        DB::commit();
    }
}