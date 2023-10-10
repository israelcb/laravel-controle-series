<x-layout title="Login" :login="true">
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button class="btn btn-primary mt-3">
            Entrar
        </button>

        <a href="{{ route('users.create') }}" class="btn btn-secondary mt-3">
            Registrar
        </a>
    </form>
</x-layout>