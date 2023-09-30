<form action="{{ $action }}" method="post">
    @csrf
    @method($method)

    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{ $nome ?? '' }}">
    </div>

    @isset($nome)
    <button type="submit" class="btn btn-warning">Atualizar</button>
    @else
    <button type="submit" class="btn btn-primary">Adicionar</button>
    @endisset
</form>