<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
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

Route::get("/", [HomeController::class, "index"])->name("HomeIndex");
Route::prefix("shop")->group(function () {
  Route::get("/products", [ShopController::class, "index"])->name("shop.index");
  Route::post("/products/filter", [ShopController::class, "filter"])->name("shop.filter");
  Route::get("/products/detail/{id}", [ShopController::class, "showDetailProduct"])->name("shop.detail");
  Route::post("/products/comments", [ShopController::class, "handleCommentSubmit"])->name("shop.comments");
});
Route::prefix("cart")->group(function () {
  Route::get("/", [CartController::class, "index"])->name("cart.index");
  Route::get("/add/{id}", [CartController::class, "addToCart"])->name("cart.add");
  Route::post("/update", [CartController::class, "updateQuantity"])->name("cart.update");
  Route::get("/deleteCart", [CartController::class, "deleteCart"])->name("cart.deleteAll");
  Route::post("/deleteItem", [CartController::class, "deleteItem"])->name("cart.deleteItem");
  Route::get("/checkout", [CartController::class, "checkout"])->name("cart.checkout")->middleware('auth');
  Route::post("/checkout/submit", [CartController::class, "handleCheckout"])->name("checkout.submit");
});
Route::get("/login", [UserController::class, "showLoginForm"])->name("login");
Route::post("/handle-login", [UserController::class, "handleLogin"])->name("login.submit");
Route::get("/register", [UserController::class, "showRegisterForm"])->name("register.index");
Route::post("/handle-register", [UserController::class, "handleRegister"])->name("register.submit");
Route::get("/logout", [UserController::class, "handleLogout"])->name("logout");

Route::get("/contact", [HomeController::class, "showFormContact"])->name("contact.index");
Route::post("/contact", [HomeController::class, "handleContact"])->name("contact.submit");
Route::get("/about", [HomeController::class, "about"])->name("about.index");

Route::get("/order", [HomeController::class, "viewOrder"])->name("order.index")->middleware('auth');
