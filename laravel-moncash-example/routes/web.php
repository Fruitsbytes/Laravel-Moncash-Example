<?php

use App\Http\Livewire\BuyPage;
use App\Http\Livewire\CartPage;
use App\Http\Livewire\HistoryPage;
use App\Http\Livewire\SettingsPage;
use App\Http\Livewire\SuccessPage;
use App\Http\Livewire\WelcomePage;
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

Route::get('/', WelcomePage::class)->name('welcome');
Route::get('/orders', HistoryPage::class)->name('orders');
Route::get('/cart', CartPage::class)->name('cart');
Route::get('/success', SuccessPage::class)->name('success');
Route::get('/store', BuyPage::class)->name('store');
Route::get('/settings', SettingsPage::class)->name('settings');
