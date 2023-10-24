<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


//user authentication
Route::get('/', function () {
    return redirect('/login');
});
// Route::get('/contact',[HomeController::class,'contact'])->name("sendmail");
Route::get('/signup', [UserController::class,'signup']);
Route::post('/signup', [UserController::class,'registration']);
Route::get('/login', [UserController::class,'login']);
Route::post('/login', [UserController::class,'validation']);
Route::get('/otp',[UserController::class,'otp']);
Route::post('/otp',[UserController::class,'otp_verify']);
Route::get('/sendotp',[UserController::class,'sendOtpEmail']);
Route::get('/forgot', function () {
    return view('forgot');
});
Route::get('/newpass', function () {
    return view('new_password');
});



//routes for the homepage url
Route::middleware(['mymiddleware'])->group(function () {
    // Define routes that should use the 'mymiddleware' middleware.
    Route::get('/home',[HomeController::class,'Home']);
});


