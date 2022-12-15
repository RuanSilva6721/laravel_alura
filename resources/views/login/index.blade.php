<x-layout title="Login" :mensagemSucesso="$mensagemSucesso">

    <form  method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

    <button type="submit" class="btn btn-primary mt-3 mb-2">Entrar</button>
        <a href="{{ route('users.create') }}" class="btn btn-secondary mt-3">Registrar</a>

    </form>
</x-layout>
