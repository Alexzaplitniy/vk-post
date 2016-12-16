<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use ATehnix\VkClient\Auth;

use GuzzleHttp\Client as HttpClient;


Route::get('/', function () {
    return view('welcome');
});

Route::post('/vk', 'VkController@index');
Route::post('/save', 'VkController@save');

Route::get('/vkauth', function (Auth $auth) {
    echo "<a 
href='https://oauth.vk.com/authorize?client_id=5605200&display=popup&scope=+8192&redirect_uri=http://localhost:8000/vkauth&response_type=token'> Войти через VK.Com </a><hr>";

    if (Request::exists('code')) {
        $token = $auth->getToken(Request::get('code'));
        echo 'Token: ' . $token;

    }
    $client = new HttpClient;

    $json = (string) $client->request('GET', 'https://api.vk.com/method/wall.post?owner_id=-19689466&message=ivan&v=5.60&&access_token=e8b30b68cc08a3cc8e5ede8780dbb633ab6b1a887d86de9865a04c3ffbbfa8f4660c4546b2dbf91fb99ee')
        ->getBody();
    $data = json_decode($json, true);

    dd($data);
});