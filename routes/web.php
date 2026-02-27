<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\CompletedShoppingListController;

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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//会員登録だお
Route::prefix('/user')->group(function () {
    Route::get('/register', [UserController::class, 'index'])->name('front.user.register');
    Route::post('/register', [UserController::class, 'register'])->name('front.user.register.post'); 
});

Route::middleware(['auth'])->group(function () {
    Route::get('/shopping_list/list', [ShoppingListController::class, 'list']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('/shopping_list/register', [ShoppingListController::class, 'register']);
    Route::delete('/shopping_list/delete/{id}', [ShoppingListController::class, 'delete']);
    Route::post('/shopping_list/complete/{id}', [ShoppingListController::class, 'complete']);
    Route::get('/completed_shopping_list/list', [CompletedShoppingListController::class, 'list']);
});