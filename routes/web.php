<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('alpine')->group(function() {
    Route::get('/test1', function () {
        return view('alpine.test1');
    })->name('alpine.test1');

    Route::get('/test2', function () {
        return view('alpine.test2');
    })->name('alpine.test2');

    Route::get('/test3', function () {
        return view('alpine.test3');
    })->name('alpine.test3');

    Route::get('/test4', function () {
        return view('alpine.test4');
    })->name('alpine.test4');

    Route::get('/test5', function () {
        return view('alpine.test5');
    })->name('alpine.test5');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified', 'nonPayingCustomer'])->get('/subscribe', function () {
    return view('subscribe', [ 'intent' => auth()->user()->createSetupIntent()]);
})->name('subscribe');

Route::middleware(['auth:sanctum', 'verified'])->post('/subscribe', function (Request $request) {  
    auth()->user()->newSubscription('Cashier', $request->plan)->create($request->paymentMethod);

    return redirect('/dashboard');
})->name('subscribe.post');

Route::middleware(['auth:sanctum', 'verified', 'payingCustomer'])->get('/members', function () {
    return view('members', [ 'intent' => auth()->user()->createSetupIntent()]);
})->name('members');

Route::middleware(['auth:sanctum', 'verified'])->get('/charge', function () {
    return view('charge', [ 'intent' => auth()->user()->createSetupIntent()]);
})->name('charge');

Route::middleware(['auth:sanctum', 'verified'])->post('/charge', function (Request $request) {  
    auth()->user()->charge(
        1000, $request->paymentMethod
    );

    // auth()->user()->createAsStripeCustomer();
    // auth()->user()->updateDefaultPaymentMethod($request->paymentMethod);
    // auth()->user()->invoiceFor('One Time Fee', 1500);
    return redirect('/dashboard');
})->name('charge.post');