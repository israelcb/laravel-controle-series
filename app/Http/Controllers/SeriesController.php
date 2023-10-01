<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;

class SeriesController extends Controller
{
    public function index()
    {
        $seriesList = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')
            ->with('seriesList', $seriesList)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $series = Series::create($request->all());

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' adicionada com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso");
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }
}
