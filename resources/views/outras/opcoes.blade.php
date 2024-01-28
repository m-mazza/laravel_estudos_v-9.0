@extends('layouts.principal')
@section('titulo', 'Opções')

@section('conteudo')

    <div class="options">
        <ul>
            <li><a class="warning {{request()->Is('opcoes/1') ? 'selected' : ''}}" href="{{route('opcoes',1)}}">warning</a></li>
            <li><a class="info {{request()->Is('opcoes/2') ? 'selected' : ''}}"    href="{{route('opcoes',2)}}">info</a></li>
            <li><a class="success {{request()->Is('opcoes/3') ? 'selected' : ''}}" href="{{route('opcoes',3)}}">success</a></li>
            <li><a class="error {{request()->Is('opcoes/4') ? 'selected' : ''}}"   href="{{route('opcoes',4)}}">error</a></li>
        </ul>
    </div>

    @if(isset($opcao))
        @switch($opcao)
            @case(1)
                @component(
                    'components.alerta', [
                        'titulo'=> 'Warning',
                        'tipo_alerta'=>'warning'
                    ]
                )
                <p><strong>Warning</strong></p>
                <p>Alert Warning</p>
                @endcomponent
                @break
            @case(2)
                @component(
                    'components.alerta', [
                        'titulo'=> 'Info',
                        'tipo_alerta'=>'info'
                    ]
                )
                <p><strong>Info</strong></p>
                <p>Alert Info</p>
                @endcomponent
                @break
            @case(3)
                @component(
                    'components.alerta', [
                        'titulo'=> 'Success',
                        'tipo_alerta'=>'success'
                    ]
                )
                <p><strong>Success</strong></p>
                <p>Alert Success</p>
                @endcomponent
                @break
            @case(4)
                @component(
                    'components.alerta', [
                        'titulo'=> 'Error',
                        'tipo_alerta'=>'error'
                    ]
                )
                <p><strong>Error</strong></p>
                <p>Alert Error</p>
                @endcomponent
                @break
            @default
        @endswitch

    @endif


@endsection
