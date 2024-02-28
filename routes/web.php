<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GOL\LancesController;
use App\Http\Controllers\GOL\AdministradorasController;
use App\Http\Controllers\GOL\CoordenadoresController;
use App\Http\Controllers\GOL\GruposController;
use App\Http\Controllers\GOL\UsersController;
use App\Http\Controllers\GOL\LancesFixosController;
use App\Http\Controllers\GOL\SimulatorController;
use App\Http\Controllers\GOL\ConsorciosSimuladorController;
use App\Http\Controllers\GOL\ConsorciosController;
use App\Http\Controllers\Blog\PostsController;
use App\Http\Controllers\Blog\TagsController;
use App\Http\Controllers\Site\HomeController as SiteController;


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


Auth::routes();

$golDomain = function () {
    Route::redirect('/home', '/', 301);
    Route::get('/', [HomeController::class, 'index'])->name('home');


    //Rota de Grupos

    Route::get('/grupos',               [GruposController::class, 'index'])->name('grupos.index');
    Route::post('/grupos',              [GruposController::class, 'store'])->name('grupos.store');
    Route::get('/grupo/{grupo}',        [GruposController::class, 'getGrupo'])->name('grupo.show');
    Route::put('/grupo/{grupo}',        [GruposController::class, 'update'])->name('grupos.update');
    Route::delete('/grupo/{grupo}',     [GruposController::class, 'delete'])->name('grupos.delete');

    Route::get('/lances-fixos/grupo/{grupo}',   [LancesFixosController::class, 'index'])->name('lances.fixos.index');
    Route::post('/lances-fixos/grupo/{grupo}',  [LancesFixosController::class, 'store'])->name('lances.fixos.store');
    Route::put('/lances-fixos/{lance}',         [LancesFixosController::class, 'update'])->name('lances.fixos.update');
    Route::delete('/lances-fixos/{lance}',      [LancesFixosController::class, 'delete'])->name('lances.fixos.delete');

    //Rotas do GOL - Gerenciado Ofetas de Lances
    Route::get('/lances',               [LancesController::class, 'index'])->name('lances.index');
    Route::post('/lances',              [LancesController::class, 'store'])->name('lances.store');
    Route::put('/aprovar/{lance}',   [LancesController::class, 'aprove'])->name('lances.aprove');
    Route::put('/rejeitar/{lance}',  [LancesController::class, 'reject'])->name('lances.reject');
    Route::put('/finalizar/{lance}', [LancesController::class, 'end'])->name('lances.end');
    Route::get('/lances/consulta',      [LancesController::class, 'search'])->name('lances.search');
    Route::get('/lances/{lance}',       [LancesController::class, 'show'])->name('lance.show');
    Route::put('/lances/{lance}',       [LancesController::class, 'update'])->name('lances.update');
    Route::delete('/lances/{lance}',    [LancesController::class, 'drop'])->name('lances.drop');
    Route::get('/lances/{administradora}/{grupo}/{cota}', [LancesController::class, 'history'])->name('lances.history');
    Route::get('/lances/{administradora}/{grupo}/{cota}/historico', [LancesController::class, 'viewHistory'])->name('view.history');

    //Rotas de Administradoras
    Route::get('/administradoras',                          [AdministradorasController::class, 'index'])->name('administradoras.index');
    Route::post('/administradoras',                         [AdministradorasController::class, 'store'])->name('administradoras.store');
    Route::put('/administradoras/{administradora}',         [AdministradorasController::class, 'update'])->name('administradora.update');
    Route::delete('administradoras/{administradora}',       [AdministradorasController::class, 'delete'])->name('administradoras.delete');
    route::get('/administradoras/{administradora}/grupos',  [AdministradorasController::class, 'getGrupos'])->name('administradora.index.grupos');

    //Rota de Coordenadores
    Route::get('/coordenadores',                      [CoordenadoresController::class, 'index'])->name('coordenadores.index');
    Route::post('/coordenadores',                     [CoordenadoresController::class, 'store'])->name('coordenadores.store');
    Route::put('/coordenadores/{user}',               [CoordenadoresController::class, 'update'])->name('coordenadores.update');
    Route::delete('/coordenadores/{user}',            [CoordenadoresController::class, 'drop'])->name('coordenadores.drop');

    Route::get('/usuarios',                           [UsersController::class, 'index'])->name('users.index');
    Route::put('/usuarios/{user}',                    [UsersController::class, 'update'])->name('users.edit');

    Route::delete('/usuario/{user}',                  [UsersController::class, 'delete'])->name('users.delete');

    Route::get('/posts',                              [PostsController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}',                       [PostsController::class, 'show'])->name('posts.show');
    Route::post('/post',                              [PostsController::class, 'store'])->name('store.post');
    Route::put('/post/{post}',                        [PostsController::class, 'update'])->name('update.post');
    Route::delete('/post/{post}',                     [PostsController::class, 'delete'])->name('post.delete');

    Route::get('/tags',                               [TagsController::class, 'index'])->name('tags.index');
    Route::post('/tag',                               [TagsController::class, 'store'])->name('tags.store');
    Route::put('/tag/{tag}',                          [TagsController::class, 'update'])->name('tags.update');
    Route::delete('/tag/{tag}',                       [TagsController::class, 'delete'])->name('tags.delete');

    Route::get('/consorcios',                         [ConsorciosController::class, 'index'])->name('consorcio.index');
    Route::POST('/consorcios',                        [ConsorciosController::class, 'store'])->name('consorcio.store');
    Route::PUT('/consorcios/{consorcio}',             [ConsorciosController::class, 'update'])->name('consorcio.edit');
    Route::DELETE('/consorcios/{consorcio}',          [ConsorciosController::class, 'delete'])->name('consorcio.delete');

    Route::get('/simulador',                          [ConsorciosSimuladorController::class, 'index'])->name('simulador.index');
    Route::post('/simulador',                         [ConsorciosSimuladorController::class, 'store'])->name('simulador.store');
    Route::put('/simulador/{consorcio}',              [ConsorciosSimuladorController::class, 'update'])->name('simulador.update');
    Route::delete('/simulador/{consorcio}',           [ConsorciosSimuladorController::class, 'delete'])->name('simulador.delete');

    Route::get('/simulador/{consorcio}',              [ConsorciosSimuladorController::class, 'indexParcelas'])->name('simulador.show');
    Route::post('/simulador-parcela',                 [ConsorciosSimuladorController::class, 'storeParcelas'])->name('parcelas.store');
    Route::put('/simulador-parcela/{parcela}',        [ConsorciosSimuladorController::class, 'editParcela'])->name('parcelas.update');
    Route::delete('/simulador-parcela/{parcela}',     [ConsorciosSimuladorController::class, 'dropParcela'])->name('parcelas.drop');

    //Rotas Complementares
    Route::get('/data-lance-valido/{administradora}', [AdministradorasController::class, 'isValidDate']);
};

$golConfig = config('app.gol');
Route::group(
    [
        'domain'    =>  "{$golConfig}",
        'namespace' =>  'gol',
        //'as' =>  "{$golConfig}."
    ],
    $golDomain
);

$siteDomain = function () {
    Route::get('/',  [SiteController::class, 'index'])->name('home');

    Route::post('/lead',                               [SimulatorController::class, 'storeLead'])->name('store.lead');
    Route::post('/tipo-consorcio',                     [SimulatorController::class, 'getValuesByType'])->name('store.tipo.consorcio');
    Route::post('/simulador-consorcio',                [SimulatorController::class, 'getConsorcios'])->name('get.consorcios');
    Route::get('/blog',                                [SiteController::class, 'blog'])->name('blog');
    Route::get('/post/{slug}',                         [SiteController::class, 'post'])->name('post');
};

$siteConfig = config('app.site');
Route::group(
    [
        'domain'    =>  "{$siteConfig}",
    ],
    $siteDomain
);
