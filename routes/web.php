<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gerenciamento\ClientesController;
use App\Http\Controllers\Gerenciamento\CategoriaServicosController;
use App\Http\Controllers\Gerenciamento\ServicosController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::prefix('/clientes')->group(function(){
    Route::get('/', [ClientesController::class, 'show'])->name('clientes.show');
    
    Route::get('/create', [ClientesController::class, 'create'])->name('clientes.create');
    
    Route::post('/store', [ClientesController::class, 'store'])->name('clientes.store');
    
    Route::get('{cliente}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
    
    Route::put('{cliente}', [ClientesController::class, 'update'])->name('clientes.update');
    
    Route::delete('/{cliente}', [ClientesController::class, 'destroy'])->name('clientes.destroy');
});

/*Route::prefix('/categoriaServicos')->group(function(){
    Route::get('/', [CategoriaServicosController::class, 'show'])->name('categoriaServicos.show');
    
    Route::get('/create', [CategoriaServicosController::class, 'create'])->name('categoriaServicos.create');
    
    Route::post('/store', [CategoriaServicosController::class, 'store'])->name('categoriaServicos.store');
    
    Route::get('{categoriaServico}/edit', [CategoriaServicosController::class, 'edit'])->name('categoriaServicos.edit');
    
    Route::put('{categoriaServico}', [CategoriaServicosController::class, 'update'])->name('categoriaServicos.update');
    
    Route::delete('/{categoriaServico}', [CategoriaServicosController::class, 'destroy'])->name('categoriaServicos.destroy');
});*/

Route::prefix('/servicos')->group(function(){
    Route::get('/', [ServicosController::class, 'show'])->name('servicos.show');

    Route::get('/create', [ServicosController::class, 'create'])->name('servicos.create');

    Route::post('/store', [ServicosController::class, 'store'])->name('servicos.store');

    Route::get('{servico}/edit', [ServicosController::class, 'edit'])->name('servicos.edit');

    Route::put('{servico}', [ServicosController::class, 'update'])->name('servicos.update');

    Route::delete('/{servico}', [ServicosController::class, 'destroy'])->name('servicos.destroy');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
