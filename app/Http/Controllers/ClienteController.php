<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private $clientes = [
        ['id'=>1, 'nome'=>'Lucas Sales'],
        ['id'=>2, 'nome'=>'Felipe Neto'],
        ['id'=>3, 'nome'=>'Alexandre de Moraes'],
        ['id'=>4, 'nome'=>'Luciana Hoffman']
    ];

    public function __construct() {
        $clientes = session('clientes');
        if(!isset($clientes)){
            session(['clientes' => $this->clientes]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //    1º forma de passar variáveis para as views: encadeamento da fução with()
        //    $clientes = session('clientes');
        //    $titulo = 'Todos os clientes';
        //    return view('clientes.index')
        //         ->with('clientes', $clientes)
        //         ->with('titulo', $titulo);

        /*
            a função with() seve para passar variáveis para às views.
            essa função recebe dois parâmetros, o primeiro é o nome da variável 'clientes',
            depois o valor da variável '$clientes'.
            a função with() pode ser encadeada.
        */


        // 2º forma de passar variáveis para as views: array associativo
        $clientes = session('clientes');
        $titulo = 'Todos os clientes';
        return view('clientes.index',
            ['clientes'=>$clientes, 'titulo'=>$titulo]
        );

        // a forma abaixo é equivalente à 2ª forma
        // return view('clientes.index', compact(['clientes', 'titulo']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = session('clientes');

        if(!$clientes){
            $id = 1;
        } else {
            $id = end($clientes)['id'] + 1;
        }

        $nome = $request->nome;
        $dados = ["id"=>$id, "nome"=>$nome];
        $clientes[] = $dados;

        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];
        return view('clientes.info', compact(['cliente']) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $cliente = $clientes[$index];
        return view('clientes.edit', compact(['cliente']) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        $clientes[$index]['nome'] = $request->nome;
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        array_splice($clientes, $index, 1);
        session(['clientes' => $clientes]);
        return redirect()->route('clientes.index');
    }

    private function getIndex($id, $clientes) {
        $ids = array_column($clientes, 'id');
        $index = array_search($id, $ids);
        return $index;
    }
}
