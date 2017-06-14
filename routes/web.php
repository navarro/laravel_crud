<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/painel/produtos/tests', 'Painel\ProdutoController@tests');

Route::resource('/painel/produtos','Painel\ProdutoController');


//Rotas 
Route::group(['namespace' => 'Site'], function() {

    Route::get('/', 'SiteController@index');
    
    Route::get('/contato', 'SiteController@contato');
    
    Route::get('/categoria/{id}', 'SiteController@categoria');
});






/*
Route::get('/teste', function () {
    return 'teste';
});

Route::get('/categoria/{id}/nome/{nome}', function ($id, $nome) {
    return 'categoria ' . $id . "nome {$nome}";
});

Route::get('/categoria/{id?}', function ($id = '') {
    return 'categoria ' . $id;
});

Route::group(['prefix' => 'painel', 'middleware'=>'auth'], function() {

    Route::get('/grupo1', function () {
        return 'grupo1';
    });

    Route::get('/grupo2', function () {
        return 'grupo2';
    });
    
});
*/