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

use App\Notifications\DingDong;
use Illuminate\Support\Facades\Notification;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send', function () {
    try {
    	Notification::send(User::first(), new DingDong());
    	
    	return response()->json([
    		'status' => 'Success'
    	], 200);
    } catch (\Exception $ex) {
    	return response()->json([
	    	'status' => 'Failure'
	    ], 404);
    }
});

Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => 3,
        'redirect_uri' => 'http://localhost:8000/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('http://api.dev/oauth/authorize?'.$query);
});

Route::get('/callback', function (Illuminate\Http\Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post('http://api.dev/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 3,
            'client_secret' => '6WFzOrkudPVy4SI60kMcrdGqjFiLQbRBpHWayha8',
            'redirect_uri' => 'http://localhost:8000/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});

