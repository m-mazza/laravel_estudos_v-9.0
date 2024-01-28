@extends('layouts.principal')
@section('titulo', 'Clientes')

@section('conteudo')

    <h3>{{$titulo}}</h3>
    <a href="{{ route('clientes.create') }} ">Cadastrar Cliente</a>
    <hr>

    @if (count($clientes)>0)
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
        <hr>
        {{-- o larvel permite outros loops além do foreach. Com 'for' é possível, usando count(clientes) para definiar o range de limites de loop, imprimir a lista de clientes --}}
        @for ($i = 0; $i < count($clientes); $i++)
            {{$clientes[$i]['nome'].' / '}}
        @endfor
        <hr>
        {{-- ao listar elementos, o larvel possue funções nativas que permite:  --}}
        @foreach ($clientes as $c)
            <p>
                {{$c['nome']}} |
                {{-- $loop->first mostra o primeiro elemento da listagem --}}
                @if ($loop->first)
                    (primeiro) |
                @endif
                {{-- $loop->last mostra o último elemento da listagem --}}
                @if ($loop->last)
                    (último) |
                @endif
                {{-- $loop->index mostra o índice do elementro impresso --}}
                ({{$loop->index}}) -
                {{-- $loop-> iteration mostra a contagem dos elementos, ou melhor qual é a iteração do elemento em relação ao conjunto impresso --}}
                {{$loop->iteration}} /
                {{-- $loop->count faz a contagem dos elementos listados --}}
                {{$loop->count}}
            </p>
        @endforeach

    @else
        <h4>Não existe clientes cadastrados</h4>
    @endif
    {{-- faz a mesma coisa que o else --}}
    @empty($clientes)
        <h4>Não existe clientes cadastrados</h4>
    @endempty

@endsection
