<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('frontend/index');
//  });

 Route::get('/',[PagesController::class,'index'])->name('index');
 Route::get('/frontend/categoryproduct/{name}',[PagesController::class,'categoryproduct'])->name('category.product');
 
 //Route::get('/',[PagesController::class,'home'])->name('home');

    Route::get('/frontend/userlogin',[PagesController::class,'userlogin'])->name('userlogin');
    Route::get('/frontend/userregister',[PagesController::class,'userregister'])->name('user.register');
    Route::post('/frontend/userregister',[PagesController::class,'userstore'])->name('user.store');
    Route::get('/frontend/about',[PagesController::class,'about'])->name('about');
    Route::get('/frontend/contact',[PagesController::class,'contact'])->name('contact');
    Route::get('/frontend/confirmation',[PagesController::class,'confirmation'])->name('confirmation');
    Route::get('/frontend/checkout',[PagesController::class,'checkout'])->name('checkout');
    Route::get('/frontend/viewproduct/{product}',[PagesController::class,'viewproduct'])->name('viewproduct');

    Route::post('/frontend/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

    //search
    Route::get('/frontend/search',[PagesController::class,'search'])->name('frontend.search');

    //User Profile
    Route::get('/frontend/userprofile/{id}',[UserController::class,'userprofile'])->name('userprofile');
    Route::post('/frontend/updateprofile',[UserController::class,'userupdate'])->name('userprofile.update');
    Route::get('/frontend/editprofile/{id}',[UserController::class,'editprofile'])->name('editprofile');
    
    //khalti
    Route::post('khalti/verify',[OrderController::class,'khaltiverifiy'])->name('khalti.verify');


Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth', 'verified','isadmin'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
    Route::get('/frontend/cart',[CartController::class,'cart'])->name('cart');
    Route::post('/frontend/cart/store',[CartController::class,'store'])->name('cart.store');
    Route::get('/frontend/cart/{id}/delete',[CartController::class,'delete'])->name('cart.delete');
    Route::post('/frontend/cart/{id}/update',[CartController::class,'update'])->name('cart.update');

    //Order
    Route::post('/order/store',[OrderController::class,'store'])->name('order.store');
   
});

//adminregister
Route::post('/user/store',[UserController::class,'userstore'])->name('users.store');
Route::get('/user/{id}/delete',[UserController::class,'destroy'])->name('users.delete');


    

Route::middleware(['auth','isadmin'])->group(function () {
    // dashboard
    Route::post('/dashboard/changemonth',[DashboardController::class,'changemonth'])->name('changemonth');
    //Categories
    Route::get('/Categories',[CategoryController::class,'index'])->name('Categories.index');
    Route::get('/Categories/create',[CategoryController::class,'create'])->name('Categories.create');
    Route::post('/Categories/store',[CategoryController::class,'store'])->name('Categories.store');
    Route::get('/Categories/{id}/edit',[CategoryController::class,'edit'])->name('Categories.edit');
    Route::post('/Categories/{id}/update',[CategoryController::class,'update'])->name('Categories.update');
    Route::get('/Categories/{id}/delete',[CategoryController::class,'delete'])->name('Categories.delete');

    //Author
    Route::get('/author',[AuthorController::class,'index'])->name('author.index');
    Route::get('/author/create',[AuthorController::class,'create'])->name('author.create');
    Route::post('/author/store',[AuthorController::class,'store'])->name('author.store');
    Route::get('/author/{id}/edit',[AuthorController::class,'edit'])->name('author.edit');
    Route::post('/author/{id}/update',[AuthorController::class,'update'])->name('author.update');
    Route::get('/author/{id}/delete',[AuthorController::class,'delete'])->name('author.delete');

    //Publisher
    Route::get('/publisher',[PublisherController::class,'index'])->name('publisher.index');
    Route::get('/publisher/create',[PublisherController::class,'create'])->name('publisher.create');
    Route::post('/publisher/store',[PublisherController::class,'store'])->name('publisher.store');
    Route::get('/publisher/{id}/edit',[PublisherController::class,'edit'])->name('publisher.edit');
    Route::post('/publisher/{id}/update',[PublisherController::class,'update'])->name('publisher.update');
    Route::get('/publisher/{id}/delete',[PublisherController::class,'delete'])->name('publisher.delete');


    //Product
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/{id}/update',[ProductController::class,'update'])->name('product.update');
    Route::get('/product/{id}/delete',[ProductController::class,'delete'])->name('product.delete');

    //orders
    Route::get('/order',[OrderController::class,'index'])->name('orders.index');
    Route::get('/order/{id}/edit',[OrderController::class,'edit'])->name('order.edit');
    Route::get('/order/{id}/update',[OrderController::class,'update'])->name('order.update');
    Route::get('/order/status/{id}/{status}',[OrderController::class,'status'])->name('order.status');
    Route::get('/order/{id}/details',[OrderController::class,'details'])->name('order.details');
    
    Route::get('/order/{id}/delete',[OrderController::class,'delete'])->name('order.delete');
    
    //users
    Route::get('/user',[UserController::class,'index'])->name('users.index');
    Route::get('/user/create',[UserController::class,'usercreate'])->name('users.create');
   

    //adminprofile
    Route::get('/adminprofile',[UserController::class,'adminprofile'])->name('adminprofile.index');
    // Route::post('/adminprofile/updateprofile',[UserController::class,'userupdate'])->name('userprofile.update');
    Route::get('/adminprofile/edit/{id}',[UserController::class,'adminedit'])->name('adminprofile.edit');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
