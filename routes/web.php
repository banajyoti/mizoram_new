<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Models\QuestionariesController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/home');
});

Route::get('/home', [RegisterController::class, 'index'])->name('home');
Route::match(['get', 'post'],'/login', [LoginController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [RegisterController::class, 'register'])->name('register');
Route::post('/send-otp', [RegisterController::class, 'sendOtp'])->name('send.otp');
Route::post('/resend-otp', [RegisterController::class, 'resendOtp'])->name('resend.otp');
Route::post('/verify-otp', [RegisterController::class, 'verifyOtp'])->name('verify.otp');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::match(['get', 'post'],'/questionaries', [\App\Http\Controllers\QuestionariesController::class, 'questionaries'])->name('questionaries');
    Route::match(['get', 'post'], '/preference', [\App\Http\Controllers\QuestionariesController::class, 'preference'])->name('preference');
    Route::match(['get', 'post'], '/centre-preference', [\App\Http\Controllers\ExamCentrePreference::class, 'centrePreference'])->name('centrePreference');
    Route::match(['get', 'post'], '/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::match(['get', 'post'], '/document', [ProfileController::class, 'document'])->name('document');
    Route::match(['get', 'post'], '/preview', [ProfileController::class, 'preview'])->name('preview');
    Route::get('/get-payment', [PaymentController::class, 'getPayment'])->name('getPayment');
    Route::get('/get-district', [ProfileController::class, 'getDistrict'])->name('getDistrict');
    Route::get('/update-preference/{prefId}/{type}', [\App\Http\Controllers\QuestionariesController::class, 'preferenceUpdate'])->name('candidate.preference.update');
    Route::get('download-ack', [DownloadController::class, 'download_ack'])->name('download_ack');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/centre-update-preference/{prefId}/{type}', [\App\Http\Controllers\ExamCentrePreference::class, 'centrePreferenceUpdate'])->name('centrePreferenceUpdate');
});
Route::post('/getresposne', [PaymentController::class, 'getresposne'])->name('getresposne_url');
Route::get('/payment-failed', [PaymentController::class, 'paymentFail'])->name('paymentFailed');
Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])->name('paymentSuccess');
Route::get('/payment-failed', [PaymentController::class, 'paymentFail'])->name('paymentFailed');
Route::get('/update-payment-status', [PaymentController::class, 'updatePaymentStatus'])->name('updatePaymentStatus');
