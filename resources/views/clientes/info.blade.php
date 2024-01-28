
@extends('layouts.principal')
@section('titulo', 'Informações')

@section('conteudo')
    <h3>Informações de clientes</h3>
    <hr>
    <p><strong>ID:</strong> {{$cliente['id']}}</p>
    <p><strong>Nome:</strong> {{$cliente['nome']}}</p>
    <br>
    <a href="{{route('clientes.index')}}">voltar</a>
@endsection
