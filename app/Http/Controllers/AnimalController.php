<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Models\Cliente;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
 * Display a listing of the resource.
 */
public function index()
{
    // 1. Pega todos os animais do banco de dados
    // O 'with('cliente')' é uma otimização (Eager Loading)
    // Ele já "puxa" os dados do dono junto com o animal.
    $animais = Animal::with('cliente')->get();

    // 2. Mostra a página HTML (View) e envia a variável $animais para ela
    return view('animais.index', compact('animais'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Mostra o FORMULÁRIO DE CADASTRO de um novo animal.
     */
    public function create()
    {
        // 1. Busca todos os Clientes (donos) do banco.
        // Precisamos disto para a lista <select> no formulário.
        $clientes = Cliente::all();

        // 2. Retorna a view 'animais.create' e envia a lista de $clientes para ela.
        return view('animais.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
 * SALVA um novo animal no banco de dados.
 */
public function store(Request $request)
{
    // 1. VALIDAÇÃO: Define as regras
    $request->validate([
        'nome' => 'required',        // O campo 'nome' é obrigatório.
        'especie' => 'required',     // O campo 'especie' é obrigatório.
        'raca' => 'required',        // O campo 'raca' é obrigatório.
        'cliente_id' => 'required|exists:clientes,id', // É obrigatório E deve existir na tabela 'clientes'.
    ]);

    // 2. CRIAÇÃO: Cria um novo objeto Animal
    $animal = new Animal();

    // 3. PREENCHIMENTO: Preenche o objeto com os dados do formulário
    $animal->nome = $request->nome;
    $animal->especie = $request->especie;
    $animal->raca = $request->raca;
    $animal->cliente_id = $request->cliente_id; // O ID do dono

    // 4. SALVAR: Insere o novo animal no banco de dados
    $animal->save();

    // 5. REDIRECIONAMENTO: Redireciona o usuário para a lista de animais
    return redirect('/animais')->with('sucesso', 'Animal cadastrado com sucesso!');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    /**
 * Mostra o FORMULÁRIO DE EDIÇÃO de um animal específico.
 */
public function edit(Animal $animal)
{
    // 1. Precisamos da lista de Clientes (donos) para o menu dropdown,
    //    caso o usuário queira mudar o dono do animal.
    $clientes = Cliente::all();

    // 2. Retorna a view 'animais.edit' e envia o $animal específico E
    //    a lista de $clientes para ela.
    return view('animais.edit', compact('animal', 'clientes'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
   /**
 * ATUALIZA um animal específico no banco de dados.
 */
public function update(Request $request, Animal $animal)
{
    // 1. VALIDAÇÃO: As mesmas regras do 'store'.
    $request->validate([
        'nome' => 'required',
        'especie' => 'required',
        'raca' => 'required',
        'cliente_id' => 'required|exists:clientes,id',
    ]);

    // 2. ATUALIZAÇÃO: Em vez de 'new Animal()', atualizamos o $animal
    //    que o Laravel já encontrou para nós.
    $animal->nome = $request->nome;
    $animal->especie = $request->especie;
    $animal->raca = $request->raca;
    $animal->cliente_id = $request->cliente_id;

    // 3. SALVAR: O Laravel entende que é um UPDATE (atualização).
    $animal->save();

    // 4. REDIRECIONAMENTO: De volta para a lista.
    return redirect('/animais')->with('sucesso', 'Animal atualizado com sucesso!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    /**
 * APAGA um animal específico do banco de dados.
 */
public function destroy(Animal $animal)
{
    // 1. Apaga o animal do banco de dados
    // (O Laravel já nos deu o $animal certo para apagar)
    $animal->delete();

    // 2. Redireciona de volta para a lista com uma mensagem
    return redirect('/animais')->with('sucesso', 'Animal apagado com sucesso!');
}
}
