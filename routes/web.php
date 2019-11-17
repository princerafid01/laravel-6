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

use App\User;
use Goutte\Client;

Route::get('/', function () {
    $data['l'] = User::all();
    return view('welcome', $data);
});
Route::get('/scrap', function () {
    $client = new Client();
    $crawler = $client->request('GET', "https://laravel-news.com/");
    $crawler->filter('a.text-white')->each(function ($node) {
        // dd($node);
        $headline = $node->text();
        echo $headline.'<br>';
    });
});
