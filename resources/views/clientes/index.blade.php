<h3>Clientes - <a href="{{ route('clientes.create') }} ">Novo Cliente</a></h3>

<hr>
<ul>
    @foreach ($clientes as $c)
        <li>
            <strong>Nome:</strong> {{$c['nome']}} | <strong>id:</strong> {{$c['id']}} |
            <a href="{{ route('clientes.edit', $c['id']) }} ">editar | </a>
            <a href="{{ route('clientes.show', $c['id']) }} ">info</a>
            <form action="{{route('clientes.destroy', $c['id'])}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Apagar">
            </form>
        </li>
    @endforeach
</ul>
