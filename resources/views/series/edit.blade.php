<x-layout title="Editar Série '{!! $series->nome !!}'">
    <x-series.form
        :action="route('series.update', $series->id)"
        method="PUT"
        :nome="$series->nome"
    ></x-series.form>
</x-layout>