<?php
use Illuminate\Http\Request;
use App\Models\{Book, Member, User, Transaction};
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

Route::middleware('auth')->group(function() {
	Route::get('dashboard', function() {
		return view('dashboard', [
			'totalBooks' => Book::get()->count(),
			'totalMembers' => Member::get()->count(),
			'totalUsers' => User::get()->count(),
			'borrowedBook' => Transaction::where('status', 'borrowed')->get()->count(),
		]);
	});

	Route::resource('book', BookController::class)->middleware('admin');
	Route::resource('member', MemberController::class)->except('show')->middleware('admin');
	Route::resource('user', UserController::class)->except('show')->middleware('admin');

	Route::resource('transaction', TransactionController::class);
	Route::get('report', [ReportController::class, 'index']);
	Route::post('report', [ReportController::class, 'filter']);
	Route::get('profile', [UserController::class, 'profile']);
	Route::put('profile/{user}', [UserController::class, 'editProfile']);
	Route::get('logout', [AuthController::class, 'logout']);
});