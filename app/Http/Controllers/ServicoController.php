<?php

namespace App\Http\Controllers;

// Importa os "Modelos" (ferramentas) de que vamos precisar
use App\Models\Servico; // O "molde" de Serviço
use App\Models\Animal; // O "molde" de Animal (para a lista de animais)
use Illuminate\Http\Request; // Para receber os dados do formulário

class ServicoController extends Controller
{
    /**
     * Mostra a PÁGINA DE LISTAGEM de serviços.
     * (Esta é a função para a rota /servicos)
     */
    public function index()
    {
        // 1. Pega todos os Serviços.
        // 2. O 'with('animal.cliente')' é uma super-otimização.
        //    Ele diz: "Traga-me o 'animal' de cada serviço, e
        //    aproveite e traga também o 'cliente' (dono) de cada animal."
        $servicos = Servico::with('animal.cliente')->get();

        // 3. Mostra a view 'servicos.index' e envia a lista de $servicos para ela.
        return view('servicos.index', compact('servicos'));
    }

    /**
     * Mostra o FORMULÁRIO DE CADASTRO de um novo serviço.
     * (Esta é a função para a rota /servicos/create)
     */
    public function create()
    {
        // Para cadastrar um serviço, precisamos de saber quais animais existem.
        // O 'with('cliente')' é para podermos mostrar "Rex (Dono: José)" na lista.
        $animais = Animal::with('cliente')->get();

        // Retorna a view de cadastro e envia a lista de $animais para ela.
        return view('servicos.create', compact('animais'));
    }

    /**
     * SALVA um novo serviço no banco de dados.
     * (Esta é a função para a rota /servicos - método POST)
     */
    public function store(Request $request)
    {
        // 1. VALIDAÇÃO: Define as regras
        $request->validate([
            'tipo' => 'required',        // O campo 'tipo' (ex: Banho) é obrigatório.
            'data' => 'required|date',   // 'data' é obrigatória e tem de ser uma data válida.
            'valor' => 'required|numeric', // 'valor' é obrigatório e tem de ser um número.
            'animal_id' => 'required|exists:animais,id', // Tem de ser um animal que exista.
        ]);

        // 2. CRIAÇÃO: Cria um novo objeto Servico
        $servico = new Servico();

        // 3. PREENCHIMENTO: Preenche o objeto com os dados do formulário
        $servico->tipo = $request->tipo;
        $servico->descricao = $request->descricao; // Descrição é opcional
        $servico->data = $request->data;
        $servico->valor = $request->valor;
        $servico->animal_id = $request->animal_id;

        // 4. SALVAR: Insere o novo serviço no banco
        $servico->save();

        // 5. REDIRECIONAMENTO: Redireciona para a lista de serviços
        return redirect('/servicos')->with('sucesso', 'Serviço agendado com sucesso!');
    }

    /**
     * (As funções show, edit, update, destroy ainda estão vazias.
     * Vamos deixar assim por enquanto para focar no cadastro.)
     */
    public function show(Servico $servico)
    {
        //
    }

   /**
 * Mostra o FORMULÁRIO DE EDIÇÃO de um serviço específico.
 */
public function edit(Servico $servico)
{
    // 1. Precisamos da lista de Animais para o menu dropdown,
    //    caso o usuário queira mudar o animal do serviço.
    $animais = Animal::with('cliente')->get();

    // 2. Retorna a view 'servicos.edit' e envia o $servico específico E
    //    a lista de $animais para ela.
    return view('servicos.edit', compact('servico', 'animais'));
}

    /**
 * ATUALIZA um serviço específico no banco de dados.
 */
public function update(Request $request, Servico $servico)
{
    // 1. VALIDAÇÃO: As mesmas regras do 'store'.
    $request->validate([
        'tipo' => 'required',
        'data' => 'required|date',
        'valor' => 'required|numeric',
        'animal_id' => 'required|exists:animais,id',
    ]);

    // 2. ATUALIZAÇÃO: Atualizamos o $servico que o Laravel já encontrou.
    $servico->tipo = $request->tipo;
    $servico->descricao = $request->descricao;
    $servico->data = $request->data;
    $servico->valor = $request->valor;
    $servico->animal_id = $request->animal_id;

    // 3. SALVAR: O Laravel entende que é um UPDATE (atualização).
    $servico->save();

    // 4. REDIRECIONAMENTO: De volta para a lista.
    return redirect('/servicos')->with('sucesso', 'Serviço atualizado com sucesso!');
}

   /**
 * APAGA um serviço específico do banco de dados.
 */
public function destroy(Servico $servico)
{
    // 1. Apaga o serviço do banco de dados
    // (O Laravel já nos deu o $servico certo para apagar)
    $servico->delete();

    // 2. Redireciona de volta para a lista com uma mensagem
    return redirect('/servicos')->with('sucesso', 'Serviço apagado com sucesso!');
}
}