<form action="{{ $action }}" method="post">
    @csrf

    @if($update)
    @method($method)
    @endif

    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control" value="{{ $nome ?? '' }}">
    </div>

    @if($update)
    <button type="submit" class="btn btn-warning">Atualizar</button>
    @else
    <button type="submit" class="btn btn-primary">Adicionar</button>
    @endif
</form>