<?php
/*
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;*/

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
use App\Http\Controller\CustomAuthController;
Route::get('/', function () {
    return view('signup');
});

//Resource::
Route::get('/home',/* function () {
    return view('home');
}*/[App\Http\Controllers\CustomAuthController::class,'home']);
Route::get('/login', [App\Http\Controllers\CustomAuthController::class,'login']);
Route::get('/registration',[App\Http\Controllers\CustomAuthController::class,'registration-user']);//specifies?


Route::get('/create_list', function () {
    return view('CreateList');
});
Route::get('/create_items', function () {
    return view('createItems');
});
Route::get('/profile',function()
{
    return view('profile');
});
Route::get('/edit_acc',function()
{
    return view('edit_acc');
});
Route::get('/items',function()
{
    return view('items');
});
Route::get('/edit',function()
{
    return view('edit_item');
});




//step 2:adding a function
//Route::post('/create-account','App\Http\Controllers\DemoController@addAccount');
Route::post('custom-login',[App\Http\Controllers\CustomAuthController::class,'customLogin'])->name('login.custom');
//Route::middleware('auth:api')->get()
//step3:read all accounts
Route::get('/list','App\Http\Controllers\DemoController@readAll');
//route for addin list
Route::post('/craeteShopList','App\Http\Controllers\ShoppingListController@addList');
//route to read user data
Route::get('/showuser/{id}','App\Http\Controllers\DemoController@readUser');
//check user login
//Route::post('/checkAcc','App\Http\Controllers\DemoController@checkAccount');
Route::post('custom-registration', [App\Http\Controllers\CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('/home','App\Http\Controllers\DemoController@protect');
Route::get('/profile','App\Http\Controllers\CustomAuthController@profile');
Route::get('/edit_acc/{id}','App\Http\Controllers\DemoController@editAcc');
//Route::get('/logout','App\Http\Controllers\DemoController@logout');
Route::get('signout',[App\Http\Controllers\CustomAuthController::class,'signOut'])->name('signout');
//delete user account
Route::get('/delete/{id}','App\Http\Controllers\DemoController@deleteAcc');
//update user account
Route::post('/updateAccount','App\Http\Controllers\DemoController@updateUserAccount');
//connection of account to shoppinglist
Route::get('/shoppingList','App\Http\Controllers\DemoController@shoppingListdata');
//
Route::get('/shoppingLists','App\Http\Controllers\DemoController@displayUserShoppingList');
//user shopping list
Route::get('/shoppingList','App\Http\Controllers\ShoppingListController@fetch');
//delete shopping list
Route::get('/deletelist/{id}','App\Http\Controllers\ShoppingListController@deletelist');
//edit shopping list
Route::get('/edit_list/{id}','App\Http\Controllers\ShoppingListController@editlist');
//update list
Route::post('/updateShopList','App\Http\Controllers\ShoppingListController@updateShopList');
//items
//creation
Route::get('/create_items/{id}','App\Http\Controllers\ItemsController@itemCreatePage');
Route::post('/createItems','App\Http\Controllers\ItemsController@addItem');
//show items
Route::get('/items/{id}','App\Http\Controllers\ItemsController@getItems');
//delete item
Route::get('/itemdelete/{id}','App\Http\Controllers\ItemsController@deleteItem');
//update item
Route::get('/edit_item/{id}','App\Http\Controllers\ItemsController@editItem');
Route::post('/updateItem','App\Http\Controllers\ItemsController@update');
    Route::post('createItem','App\Http\Controllers\ItemsController@addItem');
    //


?>
