<?php
//C (Create), o R (Read) e o U (Update) "D" (Delete / Apagar). crud
namespace App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Importando os "Modelos" e "Ferramentas"
|--------------------------------------------------------------------------
|
| Aqui, importamos (use) as classes que vamos precisar:
| - Request: Para pegar os dados que vêm do formulário (ex: o nome, o telefone).
| - Cliente: É o nosso "Model", a representação da tabela 'clientes' no banco de dados.
|
*/
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     
     *
     * @return \Illuminate\Http\Response
     */
    /**

 */
/**
 * Mostra a PÁGINA DE LISTAGEM de clientes.
 * Esta função é ativada quando alguém acessa a URL /clientes (método GET).
 */
public function index()
{
    // 1. Busca TODOS os registros da tabela 'clientes' no banco de dados.
    // O Laravel usa o Model 'Cliente' para fazer isso.
    $clientes = Cliente::all(); 

    // 2. Retorna a "view" (o arquivo HTML/Blade) que está em:
    // resources/views/clientes/index.blade.php
    //
    // A função compact('clientes') cria um "pacote" de dados
    // e envia a variável $clientes (que pegamos do banco) para dentro da view.
    return view('clientes.index', compact('clientes'));
}
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    /**
 * 
 */
/**
 * Mostra o FORMULÁRIO DE CADASTRO de um novo cliente.
 * Esta função é ativada quando alguém acessa a URL /clientes/create (método GET).
 */
public function create()
{
    // 1. Apenas retorna a "view" (o arquivo HTML/Blade) que está em:
    // resources/views/clientes/create.blade.php
    //
    // Esta função não precisa buscar nada do banco, ela só mostra o formulário vazio.
    return view('clientes.create');
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    // 1. Validar os dados (opcional, mas boa prática)
    // Estamos dizendo que 'nome', 'telefone' e 'endereco' são obrigatórios.
    $request->validate([
        'nome' => 'required',
        'telefone' => 'required',
        'endereco' => 'required',
    ]);

    // 2. Criar um novo objeto Cliente
    $cliente = new Cliente();

    // 3. Preencher o objeto com os dados do formulário ($request)
    $cliente->nome = $request->nome;
    $cliente->telefone = $request->telefone;
    $cliente->endereco = $request->endereco;

    // 4. Salvar o objeto no banco de dados
    $cliente->save();

    // 5. Redirecionar o usuário de volta para a lista de clientes
    // O with('sucesso', ...) é uma "mensagem flash" que podemos mostrar na lista.
    return redirect('/clientes')->with('sucesso', 'Cliente cadastrado com sucesso!');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    /**
 * Show the form for editing the specified resource.
 */
public function edit(Cliente $cliente)
{
    // Esta linha diz: retorne a view 'clientes.edit' e
    // envie a variável $cliente (que o Laravel já buscou) para ela.
    return view('clientes.edit', compact('cliente'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    /**
 * Update the specified resource in storage.
 */
public function update(Request $request, Cliente $cliente)
{
    // 1. Validar os dados (mesma regra do 'store')
    $request->validate([
        'nome' => 'required',
        'telefone' => 'required',
        'endereco' => 'required',
    ]);

    // 2. Atualizar o objeto $cliente com os dados do formulário ($request)
    // 
    $cliente->nome = $request->nome;
    $cliente->telefone = $request->telefone;
    $cliente->endereco = $request->endereco;

    // 3. Salvar as alterações no banco de dados
    $cliente->save();

    // 4. Redirecionar o usuário de volta para a lista de clientes
    return redirect('/clientes')->with('sucesso', 'Cliente atualizado com sucesso!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    /**
 * Remove the specified resource from storage.
 */
public function destroy(Cliente $cliente)
{
    // 1. Apaga o cliente do banco de dados
    $cliente->delete();

    // 2. Redireciona de volta para a lista com uma mensagem de sucesso
    return redirect('/clientes')->with('sucesso', 'Cliente apagado com sucesso!');
}
}
