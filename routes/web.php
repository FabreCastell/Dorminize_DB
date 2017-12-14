<?php
use App\Client;
use App\Bill;
use App\Dorm;
use App\DormExpense;
use App\Furniture;
use App\Owner;
use App\Room;
use App\RoomType;
use App\Staff;

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
    $clients = Client::all();
    return $clients;
});

Route::get('/select/{dormId}', function ($dormId) {
    $rooms = Dorm::findOrFail($dormId)->room;
    return $rooms;
});

// Route::get('/dorms/app/{dormId}', ['uses' => 'DormController@app']);

// Route::get('staffs/{dormId}', ['as' => 'staffs.index', 'uses' => 'StaffController@index']);

Route::resource('clients','ClientController');

Route::resource('bills','BillController');

Route::resource('clientBills','ClientBillController');

Route::resource('dorms','DormController');

Route::resource('clientDorms','ClientDormController');

Route::resource('staffs','StaffController');

Route::resource('clientStaffs','ClientStaffController');

Route::resource('rooms','RoomController');

Route::resource('clientRooms','ClientRoomController');

Route::resource('dormExpenses','DormExpenseController');

Route::resource('roomTypes','RoomTypeController');

Route::resource('owners','OwnerController');

Route::resource('furnitures','FurnitureController');


$router->get('/selectdorm/{dormId}/', function ($dormId) {
    return Dorm::findOrFail($dormId)->room;
});

Route::get('/dormcal/{dormId}', 'WebController@expense');
Route::get('/dormcalmonth/{dormId}/{monthID}', 'WebController@expensepmonth');








Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
