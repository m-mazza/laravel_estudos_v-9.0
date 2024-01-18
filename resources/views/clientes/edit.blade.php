<h3>Novo Cliente</h3>
<hr>
<br>
<form action="{{route('clientes.update', $cliente['id'])}}" method="POST">
    @csrf
    @method('PUT')
    <label for="nmCliente">Nome</label>
    <input type="text" name="nome" id="nmCliente" value="{{$cliente['nome']}}">
    <input type="submit" value="Editar usuário">
</form>
<br>
<a href="{{route('clientes.index')}}">voltar</a>
