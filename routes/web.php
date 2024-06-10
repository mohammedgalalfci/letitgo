<?php

use App\Models\AboutUs;
use App\Models\WhyLetGo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\HomeController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\dashboard\UsersController;
use App\Http\Controllers\dashboard\AboutUsController;
use App\Http\Controllers\dashboard\HistoryController;
use App\Http\Controllers\dashboard\InspireController;
use App\Http\Controllers\dashboard\OurGoalController;
use App\Http\Controllers\dashboard\SlidersController;
use App\Http\Controllers\dashboard\ProductsController;
use App\Http\Controllers\dashboard\WhyLetGoController;
use App\Http\Controllers\dashboard\ContactUsController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\OurVisionController;
use App\Http\Controllers\dashboard\OurMessageController;
use App\Http\Controllers\dashboard\CharacterizeUsController;
use App\Http\Controllers\dashboard\ProductComponentController;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ],
        'as' => 'dashboard.',
    ], function(){ 
        Route::group(['prefix' => 'dashboard'],function(){
            Route::get('/',[DashboardController::class,'index'])->name('dashboard');
            Route::get('/profile',[ProfileController::class,'show'])->name('profile');
            Route::put('/update-profile/{user}',[ProfileController::class,'update'])->name('profile.update');
            Route::post('/change-password',[ProfileController::class,'changePassword'])->name('profile.change_password');
            Route::resource('users', UsersController::class);
            Route::resource('sliders', SlidersController::class);
            Route::resource('products', ProductsController::class);
            Route::resource('inspires', InspireController::class);
            Route::resource('product-components', ProductComponentController::class);
            Route::get('get-product-components/{product}', [ProductComponentController::class,'componentsAtProduct'])->name('product.components');
            Route::post('products-offer/{product}',[ProductsController::class,'offer'])->name('products.offer');
            Route::post('products-delete-offer/{product}',[ProductsController::class,'deleteOffer'])->name('products.delete-offer');
            Route::resource('about-us', AboutUsController::class);
            Route::resource('histories', HistoryController::class);
            Route::resource('characterize-us', CharacterizeUsController::class);
            Route::resource('our-messages', OurMessageController::class);
            Route::resource('why-let-gos', WhyLetGoController::class);
            Route::resource('our-goals', OurGoalController::class);
            Route::resource('our-visions', OurVisionController::class);
            Route::resource('contact-us', ContactUsController::class);
            
        });
    }
);

Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
    'as' => 'site.',
], function(){ 
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/about-us',[\App\Http\Controllers\site\AboutUsController::class,'index'])->name('about-us');
    Route::post('/add-contact-us',[\App\Http\Controllers\site\ContactUsController::class,'store'])->name('add.contact-us');
    Route::get('/contact-us',[\App\Http\Controllers\site\ContactUsController::class,'index'])->name('contact-us');
    Route::get('/products',[\App\Http\Controllers\site\ProductController::class,'index'])->name('products');
    Route::get('/inspire',[\App\Http\Controllers\site\InspireController::class,'index'])->name('inspire');
    Route::get('/product-details/{id}',[\App\Http\Controllers\site\ProductController::class,'show'])->name('product.show');
    Route::get('/about-company',[\App\Http\Controllers\site\AboutCompanyController::class,'aboutCompany'])->name('about-company');
    Route::post('/search',[\App\Http\Controllers\site\ProductController::class,'search'])->name('search');
});



require __DIR__.'/auth.php';