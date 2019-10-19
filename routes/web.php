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
use \App\Product;

Route::get('products', function(){

    //Mostrar criação com Eloquent
     // - Active Record
    //  $product = new Product();
    //  $product->name = 'Produto Teste';
    //  $product->price = 19.99;
    //  $product->description = 'Descrição produto...';
    //  $product->body = 'Conteúdo do produto...';
    //  $product->slug = 'produto-teste';

    //  $product->save(); //aqui ele vai inserir na base...
    //Mass Assignment -> Atribuição em massa?!
    // $product = new Product();
    // $product->create([
    //     'name' =>'Produto Teste',
    //     'price' => 19.99,
    //     'description' => 'Descrição produto...',
    //     'body' => 'Conteúdo do produto...',
    //     'slug' => 'produto-teste',
    // ]);

    //Algumas queries
    //Product::all(); //select * from products
    //Product::paginate(2); // paginação
    //Product::find(2); // busca um dado especifico
    //Product::where('slug', 'produto-teste')->get();
    //Product::whereSlug('produto-teste')->get(); //select com condicoes
});

//Definindo um prefixo para um grupo de rotas
Route::group(['middleware' => ['auth']], function(){

    Route::prefix('admin')->namespace('Admin')->group(function(){

        // Route::get('products', 'Admin\\ProductController@index')->middleware('auth');
        Route::resource('products', 'ProductController');

    });

});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@single')->name('single');

Route::prefix('/cart')->name('cart.')->group(function(){

    Route::get('/', 'CartController@index')->name('index');

    Route::post('/add', 'CartController@add')->name('add');

    Route::get('/remove/{slug}', 'CartController@remove')->name('remove');

    Route::get('/cancel', 'CartController@cancel')->name('cancel');
});

Auth::routes();
