<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;
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

Route::get('/', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::middleware('admin')->group(function() {
	Route::resource('book', BookController::class);
	Route::resource('member', MemberController::class)->except('show');
	Route::resource('user', UserController::class)->except('show');
});	

Route::middleware('auth')->group(function() {
	Route::get('dashboard', function() {
		return view('dashboard');
	});
	Route::resource('transaction', TransactionController::class);
	Route::get('report', [ReportController::class, 'index']);
	Route::post('report', [ReportController::class, 'filter']);
	Route::put('editProfile/{user}', [UserController::class, 'editProfile']);
	Route::get('logout', [AuthController::class, 'logout']);
});