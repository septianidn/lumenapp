<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
/** @var \Laravel\Lumen\Routing\Router $router */

use App\Models\User;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return ["Hello Hai..!!!"];
});

$router->get('/data', function () use ($router) {
    $results = User::all();
    return response()->json($results);
});

$router->post('/register', 'AuthController@register');
$router->post('/login','AuthController@login');

$router->put('/profil/ubah', 'UserController@ubahProfil');

$router->get('api/barang/{id_kategori}',  'BarangController@index');


$router->group(['middleware' => 'auth'], function() use ($router){
    $router->post('/logout', 'AuthController@logout');
     $router->put('editProfil', 'UserController@ubahProfil');
      $router->put('editPassword', 'UserController@ubahPassword');
});
