<h3>Novo Cliente</h3>
<hr>
<br>
<form action="{{route('clientes.store')}}" method="POST">
    @csrf
    <label for="nmCliente">Nome</label>
    <input type="text" name="nome" id="nmCliente">
    <input type="submit" value="Cadastrar">
</form>
