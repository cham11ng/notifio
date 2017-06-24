<?php

use Illuminate\Support\Facades\Redis;

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

Route::get('/', function () {
	// 1. Publish event with Redis
	$data = [
		'event' => 'UserSignedUp',
		'data' => [
			'username' => 'JohnDoe'
		]
	];
    
    Redis::publish('cham11ng', json_encode($data));
 	
 	// 2. Node.js + Redis subscribes to the event

    // 3. Use socket.io to emit to all clients.

    return view('welcome');
});

