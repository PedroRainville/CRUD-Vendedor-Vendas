<?php

use App\Http\Controllers\VendaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Vendedor;
use App\Models\Venda;
use App\Http\Controllers\VendedorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/vendedor-cadastro', function () {
    return view('vendedores.vendedor');
});

Route::get('/', function(){
    return view('menu');
});

Route::prefix('vendedores')->group(function () {
    Route::get('/mostrar-vendedoresweb', [VendedorController::class, 'indexweb'])->name('tudo');

    Route::get('/adicionar-vendedorweb', function () {
        return view('vendedores.cadastrar');
    });
    Route::post('/adicionar-vendedorweb', [VendedorController::class, 'storeweb']);

    Route::get('/{id}/edit', [VendedorController::class, 'edit'])->name('buscar-vendedor');
    Route::put('/{id}', [VendedorController::class, 'updateweb'])->name('atualizar-vendedor');

    Route::delete('/{id}', [VendedorController:: class, 'destroyweb'])->name('deletar-vendedor');
});

Route::prefix('vendas')->group(function(){
    Route::get('/mostrar-vendasweb', [VendaController::class, 'indexweb'])->name('tudovendas');

    Route::get('/adicionar-vendasweb', function () {
        return view('vendas.cadastrar');
    });
    Route::post('/adicionar-vendasweb', [VendaController::class, 'storeweb']);

    Route::get('/{id}/edit', [VendaController::class, 'edit'])->name('buscar-venda');
    Route::put('/{id}', [VendaController::class, 'updateweb'])->name('atualizar-vendaweb');

    Route::delete('/{id}', [VendaController:: class, 'destroyweb'])->name('deletar-vendaweb');


});



Route::post('/vendedor-cadastro', function(Request $dados){
    Vendedor::create([
        'nome' => $dados->nome,
        'email' => $dados->email
    ]);
    echo 'Vendedor cadastrado com sucesso';
});

Route::get('/mostrar-vendedor/{id}', function ($id){
    $vendedor = Vendedor::findOrFail($id);
    echo "ID: " . $vendedor->id;
    echo "</br>";
    echo "Nome: " . $vendedor->nome;
    echo "</br>";
    echo "Email: " . $vendedor->email;
});

Route::get('/edita-vendedor/{id}', function ($id){
    $vendedor = Vendedor::findOrFail($id);
    return view('putvendedor', ['vendedor' => $vendedor]);
});

Route::put('/atualizar-vendedor/{id}', function (Request $dados, $id){
    $vendedor = Vendedor::findOrFail($id);
    $vendedor->nome = $dados->nome;
    $vendedor->email = $dados->email;
    $vendedor->save();
    echo "Vendedor atualizado!!!";
});

Route::delete('/excluir-vendedor/{id}', [VendedorController::class, 'excluirVendedor'])->name('excluir.vendedor');


Route::delete('/deletar-vendedor/{id}', [VendedorController::class, 'destroy']);
















Route::get('/venda-cadastro', function(){
    return view('venda');
});

Route::post('/venda-cadastro', function(Request $dados){
    Venda::create([
        'id_vendedor' => $dados->id_vendedor,
        'valor' => $dados->valor,
        'data_venda' => $dados->data_venda
    ]);
    echo 'Venda cadastrada com sucesso';
});

Route::get('/mostrar-vendas/{id}', function ($id) {
    $venda = Venda::findOrFail($id);
    echo "ID: " . $venda->id;
    echo "<br/>";
    echo "ID_Vendedor: " . $venda->id_vendedor;
    echo "<br/>";
    echo "Valor: " . $venda->valor;
    echo "<br/>";
    echo "Data: " . $venda->data_venda;
});

