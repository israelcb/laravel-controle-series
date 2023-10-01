<?php
namespace App\Repositories;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Support\Facades\DB;

class SeriesRepository
{
    public function add(array $data)
    {
        DB::beginTransaction();

        $series = Series::create($data);

        $seasons = array();
        for ($i = 1; $i <= $data['seasonsQty']; $i++) {
            $seasons[] = array(
                'series_id' => $series->id,
                'number'    => $i,
            );
        }
        Season::insert($seasons);

        $episodes = array();
        foreach ($series->seasons as $season) {
            for ($i = 1; $i <= $data['episodesPerSeason']; $i++) {
                $episodes[] = array(
                    'season_id' => $season->id,
                    'number'    => $i,
                );
            }
        }
        Episode::insert($episodes);

        DB::commit();

        return $series;
    }
}