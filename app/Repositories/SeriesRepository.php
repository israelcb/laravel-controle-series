<?php
namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Support\Facades\DB;

class SeriesRepository
{
    public function add(SeriesFormRequest $request)
    {
        DB::beginTransaction();

        $series = Series::create($request->all());

        $seasons = array();
        for ($i = 1; $i <= $request->seasonsQty; $i++) {
            $seasons[] = array(
                'series_id' => $series->id,
                'number'    => $i,
            );
        }
        Season::insert($seasons);

        $episodes = array();
        foreach ($series->seasons as $season) {
            for ($i = 1; $i <= $request->episodesPerSeason; $i++) {
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