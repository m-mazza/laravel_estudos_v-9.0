<h3>Clientes - <a href="{{ route('clientes.create') }} ">Novo Cliente</a></h3>

<hr>
<ol>
    @foreach ($clientes as $c)
        <li>
            {{$c['nome']}} |
            <a href="{{ route('clientes.edit', $c['id']) }} ">editar</a>
        </li>
    @endforeach
</ol>
