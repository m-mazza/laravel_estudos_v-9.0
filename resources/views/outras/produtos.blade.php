@extends('layouts.principal')
@section('titulo', 'Produtos')

@section('conteudo')

    <h3>Produtos</h3>
    <ul>
        <li>PC</li>
        <li>Notebook</li>
        <li>Mouse</li>
        <li>Camisetass</li>
    </ul>
    <a href="{{route('clientes.index')}}">voltar</a>

@endsection
