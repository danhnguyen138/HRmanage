<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\RecruitController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

/*Check side bar to active */
function setActiveSide($route){
    if (is_array($route)){
        return is_array(Request::path(),$route)?'active':'';
    }
    return Request::path()?'active':'';
}
Auth::routes();

Route::get('/', function () {
    return view('dashboard.dashboard');
})->middleware('auth');

//------------Login-------------//
Route::controller(LoginController::class)->group(function(){
    Route::get('/login','login')->name('login');
    Route::post('/login','authenticate');
    Route::get('/logout','logout')->name('logout');
});
//------------Register-----------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register','storeUser')->name('register');    
});
//------------Main dashboard----------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home')->middleware('auth');
});
//----------------User Infor----------//
Route::controller(UserController::class)->group(function(){
    Route::get('profile_user','profile')->middleware('auth')->name('profile_user');
    Route::put('profile_user/save','updateUser')->name('profile_user/save');
});
//---------------Personal Manage--------//
Route::controller(PersonalController::class)->group(function(){
    Route::get('/staffview','index')->name('staffview');
  
    Route::get('/add-employee','create')->middleware('isAdmin');
    Route::post('/add-employee','store');
    Route::get('/staffview/view_detail/{user_id}','view_detail');
    Route::get('/staffview/delete/{user_id}','delete')->middleware(('isAdmin'));
    
  
});
//---------------Salary Manager---------------///
Route::controller(SalaryController::class)->group(function(){
    Route::get('/viewsalary','index')->middleware('isAdmin');
    Route::get('/payroll','story')->middleware('isAdmin');
    Route::post('/payroll/save','update');
    Route::get('/viewsalary/detail/{user_id}','view_detail');
    Route::get('/viewsalaryuser','view_user_detail')->middleware('isMembership');
    //Thieu delete
});
//-------------Holiday Manager----------------///
Route::controller(HolidayController::class)->group(function(){
    Route::get('viewholidayuser','indexUser')->middleware('isMembership');
    Route::get('viewholidayuser/detail/{hl_id}','viewDetailUser');
    Route::get('createholiday','store')->middleware(('isMembership'));
    Route::post('createholiday','create');



    Route::get('viewholidayadmin','indexAdmin')->middleware('isAdmin');
    Route::get('viewholidayadmin/detail/{hl_id}','detailAdmin')->middleware(('isAdmin'));
    Route::put('viewholidayadmin/detail/{hl_id}','checkHoliday');
});
//--------------Recruit-----------------///
Route::controller(RecruitController::class)->group(function (){
    Route::get('createrecruit','create')->middleware('isAdmin');
    Route::post('createrecruit','store');

    Route::get('viewrecruitadmin','index')->middleware('isAdmin');
    Route::get('viewrecruitadmin/detail/{id_recruit}','viewDetailRecruit')->middleware('isAdmin');
    Route::get('viewrecruitadmin/detail/CV/{id_candidate}','viewDetaiCV')->middleware('isAdmin');
    
    

});





