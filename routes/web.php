<?php

use Illuminate\Support\Facades\Route;

use app\Http\Controllers;
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
    return view('home');
});

Route::get('/userLogin', function () {
    return view('dashboard_user');
});

// Route::get('/test1', function () {
//     return view('dashboard_user');
// });


$api = app(\Dingo\Api\Routing\Router::class);

$api->version('v1',['namespace' => 'App\Http\Controllers'],function ($api) {

    $api->post('userLogin', 'UserController@userLogin');
    $api->post('userRegister','UserController@userRegister');
    $api->post('userLoginSuccess','UserController@userLoginSuccess');

    $api->get('getNumOfOrders','DashboardController@getNumOfOrders');
    $api->get('getNumOfClients','DashboardController@getNumOfClients');
    $api->get('getAmount','DashboardController@getAmount');
    $api->get('getOrderAndAmountByMonth/{startDate}/{endDate}','DashboardController@getOrderAndAmountByMonth');
    $api->get('getAllOrder/{startDate}/{endDate}','DashboardController@getAllOrder');
    $api->get('getAllUser','DashboardController@getAllUser');
    $api->get('getAllOrderByUser/{user}','DashboardController@getAllOrderByUser');
    $api->get('getOrderAndAmountByMonthUser/{startDate}/{endDate}/{user}','DashboardController@getOrderAndAmountByMonthUser');
    $api->get('getNumOfOrdersByUser/{user}','DashboardController@getNumOfOrdersByUser');
    $api->get('getAmountByUser/{user}','DashboardController@getAmountByUser');

});

// $api->version('v3', function ($api) {
//     $api->post('user/auth', function () {
//         $credentials = app('request')->only('username', 'password');
//         try {
//             if (! $token = \Tymon\JWTAuth\Facades\JWTAuth::attempt($credentials)) {
//                 throw new \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException('Invalid credentials');
//             }
//         } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
//             throw new \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException('Create token failed');
//         }

//         return compact('token');
//     });
// });