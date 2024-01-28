@extends('layouts.principal')
@section('titulo', 'Departamentos')

@section('conteudo')

   <h3>Departamentos</h3>
   <ul>
      <li>Computadores</li>
      <li>Eletrônicos</li>
      <li>Acessórios</li>
      <li>Roupas</li>
   </ul>
   <a href="{{route('clientes.index')}}">voltar</a>

   <@php
        $titulo = 'Errrou';
   @endphp

    {{-- aqui é criado um componente e atribuido valores via array associativo. Pode-se passar quantos arrays quiser --}}
    @component(
        'components.alerta', [
            'titulo'=> $titulo,
            'tipo_alerta'=>'error'
        ]
    )
   <p><strong>Erro inesperado</strong></p>
   <p>Ocorreu um erro inesperado</p>
   @endcomponent


@endsection
