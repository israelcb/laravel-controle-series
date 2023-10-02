<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Repositories\EpisodesRepository;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    function __construct(private EpisodesRepository $repository) {}

    public function index(Season $season)
    {
        $mensagemSucesso = session('mensagem.sucesso');

        return view('episodes.index')
            ->with('episodes', $season->episodes)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function update(Season $season, Request $request)
    {
        $episodes = $request->episodes;
        $this->repository->markAsWatched($season, $episodes);

        return to_route('episodes.index', $season->id)
            ->with('mensagem.sucesso', 'Episódios atualizados com sucesso!');
    }
}
