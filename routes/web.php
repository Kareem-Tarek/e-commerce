<?php

use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\LoginController;

/*----------------------------- Start Website Controllers usage -----------------------------*/
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\RatingController;
// use App\Http\Controllers\FacebookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FAQsController;
use App\Http\Controllers\MissionVisionController;
/*----------------------------- End Website Controllers usage -----------------------------*/

/*----------------------------- Start Dashboard Controllers usage -----------------------------*/
use App\Http\Controllers\Admin\DashboardHomeController;
use App\Http\Controllers\Admin\DashboardProductController;
use App\Http\Controllers\Admin\DashboardCategoryController;
use App\Http\Controllers\Admin\DashboardCartController;
use App\Http\Controllers\Admin\DashboardUserController;
use App\Http\Controllers\Admin\DashboardProfileController;
/*----------------------------- End Dashboard Controllers usage -----------------------------*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(["verify" => true]);

/////////////////////////------------------------- start website route. -------------------------/////////////////////////

Route::group([], function () {    //group function for "home" route (same route name "home")
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

/******************************************** Start Socialite for GITHUB ********************************************/
Route::group(['middleware' => 'guest'], function () {
    Route::get('/sign-in/github', [LoginController::class, 'github'])->name('github_oauth');
    Route::get('/sign-in/github/redirect', [LoginController::class, 'githubRedirect']);
});
/******************************************** End Socialite for GITHUB ********************************************/

/******************************************** Start Socialite for GOOGLE ********************************************/
Route::group(['middleware' => 'guest'], function () {
    Route::get('/sign-in/google', [LoginController::class, 'google'])->name('google_oauth');
    Route::get('/sign-in/google/redirect', [LoginController::class, 'googleRedirect']);
});
/******************************************** End Socialite for GOOGLE ********************************************/

/******************************************** Start Socialite for FACEBOOK ********************************************/
Route::group(['middleware' => 'guest'], function () {
    Route::get('/sign-in/facebook', [LoginController::class, 'facebook'])->name('facebook_oauth');
    Route::get('/sign-in/facebook/redirect', [LoginController::class, 'facebookRedirect']);
});
/******************************************** End Socialite for FACEBOOK ********************************************/

/******************************************** Start profile & edit-profile Route ********************************************/
Route::group([
    'middleware' => ['auth'] // more than one middleware for the one or more route
], function () {
    Route::get('/profile', [ProfileController::class, 'cartItems_in_user_profile'])->name('User');
    Route::get('/edit-profile', [ProfileController::class, 'editProfile'])->name('editProfile');
    Route::post('/edit-profile-post', [ProfileController::class, 'profileUpdatePassword'])->name('editProfile-post');
    Route::post('/edit-myProfile', [ProfileController::class, 'edit_my_Profile'])->name('editMyProfile');
});
/******************************************** End profile & edit-profile Route ********************************************/

/******************************************** Start email verification Route ********************************************/
Route::get('/email-verification', [VerificationController::class, 'index'])->name('email-verification');
/************************************************************************************************************************/

/************************************* Start Forgot Password (reset by Email) Route *************************************/
Route::get('/reset-password', [ForgotPasswordController::class, 'index'])->name('reset-password');
/************************************************************************************************************************/

/************* Start reset Password (change password by using the email that was used for "Forgot Password") Route *************/
Route::get('/change-password', [ResetPasswordController::class, 'index'])->name('change-password');
/*******************************************************************************************************************************/

/************************************************************ Start Products Routes ************************************************************/
Route::get('/products', [ProductController::class, 'index'])->name('products'); //products-landing-page
Route::get('/search' , [ProductController::class, 'search'])->name('search'); //product-results-landing-page (from the search 'query')
Route::get('/all-product-items', [ProductController::class, 'all_product_items'])->name('all_product_items'); //all-products-page (everything in general)
Route::get('/all-clothes', [ProductController::class, 'clothes_all_filter'])->name('clothes_all_filter'); //all-clothes-page
Route::get('/latest-items', [ProductController::class, 'latest_items'])->name('latest_items'); //latest-items-page
Route::get('/kids-wear', [ProductController::class, 'clothes_kids_filter'])->name('clothes_kids_filter'); //kids-clothes-page-only
Route::get('/men-wear', [ProductController::class, 'clothes_men_filter'])->name('clothes_men_filter'); //men-clothes-page-only
Route::get('/women-wear', [ProductController::class, 'clothes_women_filter'])->name('clothes_women_filter'); //women-clothes-page-only
Route::get('/formal-clothes', [ProductController::class, 'formal_clothes_all_filter'])->name('formal_clothes_all_filter'); //all-formal-clothes-page
Route::get('/casual-clothes', [ProductController::class, 'casual_clothes_all_filter'])->name('casual_clothes_all_filter'); //all-casual-clothes-page
Route::get('/sports-wear-clothes', [ProductController::class, 'sports_wear_clothes_all_filter'])->name('sports_wear_clothes_all_filter'); //all-sports-wear-clothes-page
Route::get('/all-accessories', [ProductController::class, 'accessories_all_filter'])->name('accessories_all_filter'); //all-accessories-page
Route::get('/kids-accessories', [ProductController::class, 'accessories_kids_filter'])->name('accessories_kids_filter'); //kids-accessories-page-only
Route::get('/men-accessories', [ProductController::class, 'accessories_men_filter'])->name('accessories_men_filter'); //men-accessories-page-only
Route::get('/women-accessories', [ProductController::class, 'accessories_women_filter'])->name('accessories_women_filter'); //women-accessories-page-only
Route::get('/products-discounts-1%-to-10%', [ProductController::class, '_1_percent_to_10_percent'])->name('1per-to-10per'); //products-discounts-between-0-to-10-percent-only
Route::get('/products-discounts-11%-to-20%', [ProductController::class, '_11_percent_to_20_percent'])->name('11per-to-20per'); //products-discounts-between-11-to-20-percent-only
Route::get('/products-discounts-21%-to-30%', [ProductController::class, '_21_percent_to_30_percent'])->name('21per-to-30per'); //products-discounts-between-21-to-30-percent-only
Route::get('/products-discounts-31%-to-40%', [ProductController::class, '_31_percent_to_40_percent'])->name('31per-to-40per'); //products-discounts-between-31-to-30-percent-only
Route::get('/products-discounts-41%-to-50%', [ProductController::class, '_41_percent_to_50_percent'])->name('41per-to-50per'); //products-discounts-between-41-to-40-percent-only
Route::get('/products-discounts-51%-to-60%', [ProductController::class, '_51_percent_to_60_percent'])->name('51per-to-60per'); //products-discounts-between-51-to-60-percent-only
Route::get('/products-discounts-61%-to-70%', [ProductController::class, '_61_percent_to_70_percent'])->name('61per-to-70per'); //products-discounts-between-61-to-70-percent-only
Route::get('/products-discounts-71%-to-80%', [ProductController::class, '_71_percent_to_80_percent'])->name('71per-to-80per'); //products-discounts-between-71-to-80-percent-only
Route::get('/products-discounts-81%-to-90%', [ProductController::class, '_81_percent_to_90_percent'])->name('81per-to-90per'); //products-discounts-between-81-to-90-percent-only
Route::get('/products-discounts-91%-to-100%', [ProductController::class, '_91_percent_to_100_percent'])->name('91per-to-100per'); //products-discounts-between-91-to-100-percent-only
Route::get('/product/{id}/{clothing_type?}/{name?}', [ProductController::class, 'single_product_page'])->name('single_product_page'); //single-product-page
/************************************************************ End Products Routes ************************************************************/

/******************************************** Start Some static website's pages Routes ********************************************/
Route::get('/company/mission-vision', [MissionVisionController::class, 'index'])->name('mission-vision');
Route::get('/company/about-us', [AboutController::class, 'index'])->name('about');
Route::get('/company/faqs', [FAQsController::class, 'index'])->name('faqs');
/******************************************** End Some static website's pages Routes ********************************************/

/******************************************** Start Subscription Routes ********************************************/
Route::post('/subscription-submit' , [SubscriptionController::class, 'submit_subscription']);
/******************************************** End Subscription Routes ********************************************/

/******************************************** Start Cart Routes ********************************************/
Route::group([
    'middleware' => ['auth', 'only_customers'] // more than one middleware for the one or more route
], function () {
    Route::get('/cart', [CartController::class , 'cart_registered'])->name('cart-registered'); //will open the cart page for registered users (customers ONLY!)
    Route::delete('/cart/{id}', [CartController::class, 'destroy_for_cart'])->name('carts.destroy');
});
Route::group([
    'middleware' => ['only_customers_and_suppliers', 'cart_already_logged_in_as_a_customer'] // more than one middleware for the one or more route
], function () {
    Route::get('/cart-guest', [CartController::class , 'cart_unregistered'])->name('cart-unregistered'); //will open a page that tells the guests to login for accessing the cart page (from the URL)
});
Route::group([
    'middleware' => ['unregistered_users' , 'only_customers']
], function () {
    Route::post('/addCart/{id}', [CartController::class, 'addCart']);
    Route::patch('/update-cart-items-quantity/{id}', [CartController::class, 'update_cart_items_quantity']);
    // Route::get('/checkout/get/items', [CartController::class, 'getCartItemsForCheckout']); // total amount!
    Route::get('/checkout-items-details', [CartController::class, 'cartCheckOutView'])->name('checkout_details');
    Route::delete('/checkout-items-details/{id}', [CartController::class, 'destroy_for_cart_and_checkout'])->name('cart_and_checkout.destroy');
});

// Route::resource('/carts', DashboardCartController::class)->except(['index', 'create', 'store', 'show', 'update', 'edit']); //the 'destroy' resource function will be the one used only!

// Route::post('/cart', [CartController_x::class, 'store'])->name('cart');
// Route::post('/process/user/payment', [CartController_x::class, 'processPayment']);
/******************************************** End Cart Routes ********************************************/

/******************************************** Start Favorite Routes ********************************************/
Route::group([
    'middleware' => ['unregistered_users' , 'only_customers']
], function () {
    Route::post('/addFavorite/{id}', [FavoriteController::class, 'addFavorite'])->name('add-to-favorite');
    Route::get('/favorites', [FavoriteController::class, 'favoritesCustomer'])->name('favorites-registered');
    Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    // Route::get('/favorites/restore/{id}/', [FavoriteController::class, 'restore'])->name('favorites.restore');
});
Route::get('/favorites-guest', [FavoriteController::class, 'favoritesGuest'])->middleware('only_guests')->name('favorites-unregistered');
/******************************************** End Favorite Routes ********************************************/

/******************************************** Start Rating Route ********************************************/
Route::post('/addRating/{id}', [RatingController::class, 'addRating'])->middleware('only_customers');
/******************************************** End Rating Route ********************************************/
Route::group([
    'middleware' => ['unregistered_users' , 'only_admins_and_moderators']
], function () {
    Route::get('/contact-info-submitted', [ContactController::class, 'contact_success_view'])->name('contact_info_submitted');
});
Route::post('/contact-submit' , [ContactController::class, 'submit_contact_form']);
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
Route::get('/contact-guest' , [ContactController::class, 'contactGuest'])->middleware('only_guests')->name('contact-guest');
/////////////////////////------------------------- end website route. -------------------------/////////////////////////






/////////////////////////------------------------- start dashboard (for admin, moderator & supplier) route. -------------------------/////////////////////////
Route::group([
    'middleware' => ['auth', 'dashboard']
], function () {

    Route::prefix('dashboard')->group(function () {
        Route::group([], function () {    //group function for dashboard "home" route (same route name "dashboard")
            Route::get('/home', [DashboardHomeController::class, 'index'])->name('dashboard');
            Route::get('/', [DashboardHomeController::class, 'index'])->name('dashboard');
        });
        /********************** Start products route. **********************/
        Route::resource('/products', DashboardProductController::class);
        Route::get('/product/sizes/{id}/{name?}', [SizeController::class, 'index'])->name('products-sizes');
        Route::get('/product/{id}/{clothing_type?}/{name?}', [DashboardProductController::class, 'single_product_page_dashboard'])->name('single_product_page_dashboard'); //single-product-page (dashboard)
        Route::get('/product/delete', [DashboardProductController::class, 'delete'])->name('products.delete');
        Route::get('/product/restore/{id}/', [DashboardProductController::class, 'restore'])->name('products.restore');
        Route::delete('/product/forceDelete/{id}/', [DashboardProductController::class, 'forceDelete'])->name('products.forceDelete');
        /********************** End products route. **********************/

        /********************** Start categories route. **********************/
        Route::resource('/categories', DashboardCategoryController::class);
        Route::get('/category/delete', [DashboardCategoryController::class, 'delete'])->name('categories.delete');
        Route::get('/category/restore/{id}/', [DashboardCategoryController::class, 'restore'])->name('categories.restore');
        Route::delete('/category/forceDelete/{id}/', [DashboardCategoryController::class, 'forceDelete'])->name('categories.forceDelete');
        /********************** End categories route. **********************/

        /********************** Start carts route. **********************/
        Route::resource('/carts', DashboardCartController::class);
        Route::get('/cart/delete', [DashboardCartController::class, 'delete'])->name('carts.delete');
        Route::get('/cart/restore/{id}/', [DashboardCartController::class, 'restore'])->name('carts.restore');
        Route::delete('/cart/forceDelete/{id}/', [DashboardCartController::class, 'forceDelete'])->name('carts.forceDelete');
        /********************** End carts route. **********************/

        //-------------------- Start users route. --------------------//
        Route::resource('/users', DashboardUserController::class);
        Route::get('/user/delete', [DashboardUserController::class, 'delete'])->name('users.delete');
        Route::get('/user/restore/{id}/', [DashboardUserController::class, 'restore'])->name('users.restore');
        Route::delete('/user/forceDelete/{id}/', [DashboardUserController::class, 'forceDelete'])->name('users.forceDelete');

        Route::get('/profile', [DashboardProfileController::class, 'profile'])->name('profile');
        Route::get('/edit-profile', [DashboardProfileController::class, 'edit'])->name('edit-profile');
        Route::post('/edit-profile-post', [DashboardProfileController::class, 'profileUpdatePassword'])->name('edit-profile-post');
        Route::post('/edit-myProfile', [DashboardProfileController::class, 'edit_my_Profile'])->name('edit-myProfile');
        //-------------------- End users route. --------------------//

    });

});
/////////////////////////------------------------- end dashboard (for admin, moderator & supplier) route. -------------------------/////////////////////////


// Route::prefix('facebook')->name('facebook.')->group( function(){
//     Route::get('auth' , FacebookController::class, 'LoginUsingFacebook')->name('login');
//     Route::get('callback' , FacebookController::class, 'callbackFromFacebook')->name('callback');
// });


//*****-------------------- start social media (facebook). --------------------*****//
// Route::get('/redirect', 'SocialAuthFacebookController@redirect');
// Route::get('/callback', 'SocialAuthFacebookController@callback');
//*****-------------------- end social media (facebook). --------------------*****//


// Route::middleware(['middleware'=>'auth'])->group(function () {
//     Auth::routes();
// });


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth']], function(){
//         Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
//         Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
//         Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');


//         Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
//         Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
//         Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');

// });

// Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth']], function(){
//     Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
//     Route::get('profile',[UserController::class,'profile'])->name('user.profile');
//     Route::get('settings',[UserController::class,'settings'])->name('user.settings');

// });