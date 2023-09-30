<x-layout title="Editar Série">
    <x-series-form
        action="{{ route('series.update', $series->id) }}"
        method="PUT"
        nome="{{ $series->nome }}"
    ></x-series-form>
</x-layout>