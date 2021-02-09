<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\stockController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\MailSend;
use App\Http\Controllers\AccountController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Distributor;
use App\Http\Middleware\Staff;

//use App\Http\Controllers\Task;


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

//Route::get('/', function () {
  //  return view('sessions.create');
//});
Route::get('/', function () {
    
    return view('sessions.create');

});


Route::get('/login',[SessionsController::class,'index']);
Route::post('/loginpost',[SessionsController::class,'store']);
Route::get('/distdashboard',[SessionsController::class,'dist'])->middleware('distributor');
Route::get('/staffdashboard',[SessionsController::class,'staff'])->middleware('staff');
Route::get('/admindashboard',[SessionsController::class,'admin'])->middleware('admin');

  Route::get('/list',[UsersController::class,'list'])->middleware('admin');
  Route::get('/deleteuser/{id}',[UsersController::class,'delete'])->middleware('admin');
  Route::get('/edituser/{id}',[UsersController::class,'showData'])->middleware('admin');
  Route::post('/edituser',[UsersController::class,'update'])->middleware('admin');
  Route::get('/adddist',[UsersController::class,'dist'])->middleware('admin');
  Route::post('/adddist',[UsersController::class,'idFetch'])->middleware('admin');
  Route::get('/searchDist',[DistributorController::class,'searchDist'])->middleware('admin');

  Route::get('/dist',[DistributorController::class,'show']);
  Route::get('/editdist1/{id}',[DistributorController::class,'showDetails'])->middleware('admin');
  Route::post('/editdist1',[DistributorController::class,'updatedist'])->middleware('admin');
  Route::get('/deletedist/{id}',[DistributorController::class,'deletedist'])->middleware('admin');

 Route::get('/countusers',[UsersController::class,'countUsers'])->middleware('admin');
 Route::get('/countdist',[DistributorController::class,'countDistributors'])->middleware('admin');
 Route::get('/assigndist/{id}',[StaffController::class,'showDetails'])->middleware('admin');
 Route::post('/assigndist',[StaffController::class,'assignDistributor'])->middleware('admin');
 

 
  Route::get('/addstaff',[UsersController::class,'staff'])->middleware('admin');
  Route::post('/addstaff',[UsersController::class,'addstaff'])->middleware('admin');

  Route::get('/staffadd',[DistributorController::class,'Staff'])->middleware('distributor');
  Route::post('/staffadd',[DistributorController::class,'staffAdd'])->middleware('distributor');


  Route::get('/lstaffall',[UsersController::class,'viewStaff'])->middleware('admin');
  Route::get('/staffall',[DistributorController::class,'viewStaff'])->middleware('distributor');


Route::get('/editstaff/{id}',[UsersController::class,'showStaffDetails'])->middleware('admin');
Route::post('/editstaff',[UsersController::class,'updatestaff'])->middleware('admin');

Route::get('/staffedit/{id}',[DistributorController::class,'showStaffDetails'])->middleware('distributor');
Route::post('/staffedit',[DistributorController::class,'updatestaff'])->middleware('distributor');


Route::get('/deletestaff/{id}',[UsersController::class,'deleteStaff'])->middleware('admin');
Route::get('/staffdelete/{id}',[DistributorController::class,'deleteStaff'])->middleware('distributor');

Route::get('/assignstaff/{id}',[UsersController::class,'showDetails'])->middleware('distributor');
Route::post('/assignstaff',[UsersController::class,'update'])->middleware('distributor');


Route::get('/addshop',[DistributorController::class,'index'])->middleware('distributor');
Route::post('/addshop',[DistributorController::class,'addshop'])->middleware('distributor');

Route::get('/shopadd',[StaffController::class,'index'])->middleware('staff');
Route::post('/shopadd',[staffController::class,'addshop'])->middleware('staff');


Route::get('/shoplist',[UsersController::class,'showShop'])->middleware('usermiddleware');
//Route::get('/listshop',[DistributorController::class,'showShop'])->middleware('distributor');
//Route::get('/listShop',[StaffController::class,'showShop'])->middleware('staff');



Route::get('/edit/{id}',[ShopController::class,'showShopDetails'])->middleware('staff');
Route::post('/edit',[ShopController::class,'updateShop'])->middleware('staff');
Route::get('/delete/{id}',[ShopController::class,'delete'])->middleware('admin');


Route::get('/countstaff',[UsersController::class,'countStaff'])->middleware('admin');
Route::get('/staffcount',[DistributorController::class,'countStaff'])->middleware('distributor');

Route::get('/countshop',[UsersController::class,'countShop'])->middleware('admin');
Route::get('/countShop',[DistributorController::class,'countShop'])->middleware('distributor');
Route::get('/shopcount',[StaffController::class,'countShop'])->middleware('staff');

Route::get('/slist',[ShopController::class,'showShop'])->middleware('staff');
route::get('/showdetails',[ShopController::class,'stockDetails'])->middleware('staff');
Route::get('/reducestock/{id}',[ShopController::class,'stockdecreform'])->middleware('staff');
Route::post('/reducestock',[ShopController::class,'StockDecrement'])->middleware('staff');

Route::get('/showincredetails',[ShopController::class,'increDetails'])->middleware('staff');

Route::get('/Incrementstock/{id}',[ShopController::class,'stockincreform'])->middleware('staff');
Route::post('/Incrementstock',[ShopController::class,'StockIncrement'])->middleware('staff');


Route::get('/reset_password_without_token',[AccountController::class,'Enteremail']);
//Route::get('/reset_password_with_token',[AccountController::class,'passform']);

Route::post('/reset_password_without_token', [AccountController::class,'getData']);
Route::get('/password/reset', [AccountController::class,'passform']);

Route::post('/reset_password_with_token', [AccountController::class,'resetPassword']);

Route::get('/logout',[SessionsController::class,'logout']);

Route::get('/changepasswordform',[UsersController::class,'passwordForm'])->middleware('usermiddleware');
Route::post('/changepassword',[UsersController::class,'changePassword'])->middleware('usermiddleware');




  



