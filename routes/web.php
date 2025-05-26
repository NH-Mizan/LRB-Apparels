<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommitmentController;
use App\Http\Controllers\admin\LicenseController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\WhyChooseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FrontEnd\MemberController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\MerchantManageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CreatePageController;
use App\Http\Controllers\Admin\Blog1;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\GalleryController;

Auth::routes();

Route::get('/cc', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cleared!";
});


Route::get('/migrate', function () {
    $exitCode = Artisan::call('migrate');
    return '<h1>Make Migration</h1>';
});


Route::group(['namespace' => 'Frontend', 'middleware' => ['check_refer']], function () {
    Route::get('/', [FrontendController::class, 'index'])->name('home');

    Route::get('about-us', [FrontendController::class, 'about_us'])->name('about_us');
    Route::get('photosgallery', [FrontendController::class, 'photosgallery'])->name('photosgallery');

    Route::get('/photo', [FrontEndController::class, 'photo'])->name('photo.gallery');
    Route::get('photo-gallery-details/{id}', [FrontEndController::class, 'gallerydetails'])->name('gallerydetails');


    Route::get('product/{category}', [FrontendController::class, 'category'])->name('category');
    Route::get('product-details/{slug}', [FrontendController::class, 'product_details'])->name('product.details');
    Route::get('blog-category/{slug}', [FrontendController::class, 'blog_category'])->name('blog_category');
    Route::get('blogs', [FrontendController::class, 'blogs'])->name('blogs');
    Route::get('blog-details/{slug}', [FrontendController::class, 'blog_details'])->name('blog.details');
    Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
    Route::get('page/{slug}', [FrontendController::class, 'page'])->name('page');
    Route::get('whychoose', [FrontendController::class, 'whychoose'])->name('whychoose');
    Route::get('commitment', [FrontendController::class, 'commitment'])->name('commitment');


});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['customer', 'ipcheck', 'check_refer']], function () {
    Route::get('locked', [DashboardController::class, 'locked'])->name('locked');
    Route::post('unlocked', [DashboardController::class, 'unlocked'])->name('unlocked');
});
Route::group(['namespace' => 'FrontEnd', 'middleware' => ['check_refer']], function () {
    Route::get('ajax-district', [FrontendController::class, 'ajax_district'])->name('ajax.districts');
    Route::get('ajax-area', [FrontendController::class, 'ajax_area'])->name('ajax.areas');
    Route::get('ajax-zone', [FrontendController::class, 'ajax_zone'])->name('ajax.zones');
    Route::post('member/logout', [MemberController::class, 'logout'])->name('member.logout');
    Route::get('/twofa-verify', [MemberController::class, 'twofa_verify'])->name('member.twofactor');
    Route::post('/verify-account', [MemberController::class, 'account_verify'])->name('member.account.verify');
    Route::post('/two-verify', [MemberController::class, 'twoverify_verify'])->name('member.account.twoverify');
});

//buyer manage route
Route::group(['namespace' => 'FrontEnd', 'middleware' => ['check_refer']], function () {
    Route::get('/login', [MemberController::class, 'login'])->name('member.login');
    Route::post('/signin', [MemberController::class, 'signin'])->name('member.signin');
    Route::get('/register', [MemberController::class, 'register'])->name('member.register');
    Route::post('/store', [MemberController::class, 'store'])->name('member.store');
    Route::get('/verify', [MemberController::class, 'verify'])->name('member.verify');

    Route::post('/resend-otp', [MemberController::class, 'resendotp'])->name('member.resendotp');
    Route::get('/forgot-password', [MemberController::class, 'forgot_password'])->name('member.forgot.password');
    Route::post('/forgot-verify', [MemberController::class, 'forgot_verify'])->name('member.forgot.verify');
    Route::get('/forgot-password/reset', [MemberController::class, 'forgot_reset'])->name('member.forgot.reset');
    Route::post('/forgot-password/store', [MemberController::class, 'forgot_store'])->name('member.forgot.store');
    Route::post('/forgot-password/resendotp', [MemberController::class, 'forgot_resend'])->name('member.forgot.resendotp');
});
// member auth
Route::group(['namespace' => 'FrontEnd', 'middleware' => ['member', 'check_refer']], function () {

    Route::get('/dashboard', [MemberController::class, 'dashboard'])->name('member.dashboard');
    Route::get('/profile', [MemberController::class, 'profile'])->name('member.profile');
    Route::get('/settings', [MemberController::class, 'settings'])->name('member.settings');
    Route::post('/basic-update', [MemberController::class, 'basic_update'])->name('member.basic_update');
    Route::post('/payment-method', [MemberController::class, 'payment_method'])->name('member.payment_method');
    Route::get('/change-password', [MemberController::class, 'change_pass'])->name('member.change_pass');
    Route::post('/password-update', [MemberController::class, 'password_update'])->name('member.password_update');
    Route::get('/buyer/payment', [MemberController::class, 'member_payment'])->name('member.parcel.payment');
    Route::get('/parcel/payable', [MemberController::class, 'payable_parcel'])->name('member.parcel.payable');
    Route::post('/payment/request', [MemberController::class, 'payment_request'])->name('member.payment.request');
    Route::get('/payment/invoice/{id}', [MemberController::class, 'payment_invoice'])->name('member.payment.invoice');
    Route::get('/parcel/fraud-checker', [MemberController::class, 'fraud_checker'])->name('member.parcel.fraud_checker');
    Route::get('/buyer/notice', [MemberController::class, 'notice'])->name('member.notice');
    Route::get('/buyer/notification', [MemberController::class, 'notification'])->name('member.notification');
    Route::get('/buyer/pricing', [MemberController::class, 'pricing'])->name('member.parcel.pricing');
    Route::get('consignment-search', [MemberController::class, 'consignment_search'])->name('member.consignment.search');

});

// auth route
Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'lock', 'check_refer'], 'prefix' => 'admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('change-password', [DashboardController::class, 'changepassword'])->name('change_password');
    Route::post('new-password', [DashboardController::class, 'newpassword'])->name('new_password');

    // users route
    Route::get('users/manage', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users/save', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('users/update', [UserController::class, 'update'])->name('users.update');
    Route::post('users/inactive', [UserController::class, 'inactive'])->name('users.inactive');
    Route::post('users/active', [UserController::class, 'active'])->name('users.active');
    Route::post('users/destroy', [UserController::class, 'destroy'])->name('users.destroy');

    // roles
    Route::get('roles/manage', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/{id}/show', [RoleController::class, 'show'])->name('roles.show');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles/save', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('roles/update', [RoleController::class, 'update'])->name('roles.update');
    Route::post('roles/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');

    // permissions
    Route::get('permissions/manage', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('permissions/{id}/show', [PermissionController::class, 'show'])->name('permissions.show');
    Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('permissions/save', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('permissions/update', [PermissionController::class, 'update'])->name('permissions.update');
    Route::post('permissions/destroy', [PermissionController::class, 'destroy'])->name('permissions.destroy');


    // about us routes
    Route::get('about/manage', [AboutController::class, 'index'])->name('abouts.index');
    Route::get('about/create', [AboutController::class, 'create'])->name('abouts.create');
    Route::post('about/save', [AboutController::class, 'store'])->name('abouts.store');
    Route::get('about/{id}/edit', [AboutController::class, 'edit'])->name('abouts.edit');
    Route::post('about/update', [AboutController::class, 'update'])->name('abouts.update');
    Route::post('about/inactive', [AboutController::class, 'inactive'])->name('abouts.inactive');
    Route::post('about/active', [AboutController::class, 'active'])->name('abouts.active');
    Route::post('about/destroy', [AboutController::class, 'destroy'])->name('abouts.destroy');

    // Photo Gallery routes
    Route::get('gallery/manage', [GalleryController::class, 'index'])->name('galleries.index');
    Route::get('gallery/create', [GalleryController::class, 'create'])->name('galleries.create');
    Route::post('gallery/save', [GalleryController::class, 'store'])->name('galleries.store');
    Route::get('gallery/{id}/edit', [GalleryController::class, 'edit'])->name('galleries.edit');
    Route::post('gallery/update', [GalleryController::class, 'update'])->name('galleries.update');
    Route::post('gallery/inactive', [GalleryController::class, 'inactive'])->name('galleries.inactive');
    Route::post('gallery/active', [GalleryController::class, 'active'])->name('galleries.active');
    Route::post('gallery/destroy', [GalleryController::class, 'destroy'])->name('galleries.destroy');
    Route::get('photogallery/image/delete/{id}', [GalleryController::class, 'singleitemdelete'])->name('singleitemdelete');
    ;


    // Teams category route
    Route::get('teams/manage', [TeamsController::class, 'index'])->name('teams.index');
    Route::get('teams/create', [TeamsController::class, 'create'])->name('teams.create');
    Route::post('teams/save', [TeamsController::class, 'store'])->name('teams.store');
    Route::get('teams/{id}/edit', [TeamsController::class, 'edit'])->name('teams.edit');
    Route::post('teams/update', [TeamsController::class, 'update'])->name('teams.update');
    Route::post('teams/inactive', [TeamsController::class, 'inactive'])->name('teams.inactive');
    Route::post('teams/active', [TeamsController::class, 'active'])->name('teams.active');
    Route::post('teams/destroy', [TeamsController::class, 'destroy'])->name('teams.destroy');



    // categories
    Route::get('slider/manage', [SliderController::class, 'index'])->name('slider.index');
    Route::get('slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('slider/save', [SliderController::class, 'store'])->name('slider.store');
    Route::get('slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::post('slider/update', [SliderController::class, 'update'])->name('slider.update');
    Route::post('slider/inactive', [SliderController::class, 'inactive'])->name('slider.inactive');
    Route::post('slider/active', [SliderController::class, 'active'])->name('slider.active');
    Route::post('slider/destroy', [SliderController::class, 'destroy'])->name('slider.destroy');


    // Blog Category route
    Route::get('blog-category/manage', [BlogCategoryController::class, 'index'])->name('blog_category.index');
    Route::get('blog-category/create', [BlogCategoryController::class, 'create'])->name('blog_category.create');
    Route::post('blog-category/save', [BlogCategoryController::class, 'store'])->name('blog_category.store');
    Route::get('blog-category/{id}/edit', [BlogCategoryController::class, 'edit'])->name('blog_category.edit');
    Route::post('blog-category/update', [BlogCategoryController::class, 'update'])->name('blog_category.update');
    Route::post('blog-category/inactive', [BlogCategoryController::class, 'inactive'])->name('blog_category.inactive');
    Route::post('blog-category/active', [BlogCategoryController::class, 'active'])->name('blog_category.active');
    Route::post('blog-category/destroy', [BlogCategoryController::class, 'destroy'])->name('blog_category.destroy');

    // Blog route
    Route::get('blog/manage', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('blog/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('blog/save', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('blog/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::post('blog/update', [BlogController::class, 'update'])->name('blogs.update');
    Route::post('blog/inactive', [BlogController::class, 'inactive'])->name('blogs.inactive');
    Route::post('blog/active', [BlogController::class, 'active'])->name('blogs.active');
    Route::post('blog/destroy', [BlogController::class, 'destroy'])->name('blogs.destroy');

    // settings route
    Route::get('settings/manage', [GeneralSettingController::class, 'index'])->name('settings.index');
    Route::get('settings/create', [GeneralSettingController::class, 'create'])->name('settings.create');
    Route::post('settings/save', [GeneralSettingController::class, 'store'])->name('settings.store');
    Route::get('settings/{id}/edit', [GeneralSettingController::class, 'edit'])->name('settings.edit');
    Route::post('settings/update', [GeneralSettingController::class, 'update'])->name('settings.update');
    Route::post('settings/inactive', [GeneralSettingController::class, 'inactive'])->name('settings.inactive');
    Route::post('settings/active', [GeneralSettingController::class, 'active'])->name('settings.active');
    Route::post('settings/destroy', [GeneralSettingController::class, 'destroy'])->name('settings.destroy');

    // settings route
    Route::get('social-media/manage', [SocialMediaController::class, 'index'])->name('socialmedias.index');
    Route::get('social-media/create', [SocialMediaController::class, 'create'])->name('socialmedias.create');
    Route::post('social-media/save', [SocialMediaController::class, 'store'])->name('socialmedias.store');
    Route::get('social-media/{id}/edit', [SocialMediaController::class, 'edit'])->name('socialmedias.edit');
    Route::post('social-media/update', [SocialMediaController::class, 'update'])->name('socialmedias.update');
    Route::post('social-media/inactive', [SocialMediaController::class, 'inactive'])->name('socialmedias.inactive');
    Route::post('social-media/active', [SocialMediaController::class, 'active'])->name('socialmedias.active');
    Route::post('social-media/destroy', [SocialMediaController::class, 'destroy'])->name('socialmedias.destroy');


    // contact routes
    Route::get('contact/manage', [ContactController::class, 'index'])->name('contact.index');
    Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('contact/save', [ContactController::class, 'store'])->name('contact.store');
    Route::get('contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::post('contact/update', [ContactController::class, 'update'])->name('contact.update');
    Route::post('contact/inactive', [ContactController::class, 'inactive'])->name('contact.inactive');
    Route::post('contact/active', [ContactController::class, 'active'])->name('contact.active');
    Route::post('contact/destroy', [ContactController::class, 'destroy'])->name('contact.destroy');


    // banner  routes
    Route::get('banner/manage', [BannerController::class, 'index'])->name('banners.index');
    Route::get('banner/create', [BannerController::class, 'create'])->name('banners.create');
    Route::post('banner/save', [BannerController::class, 'store'])->name('banners.store');
    Route::get('banner/{id}/edit', [BannerController::class, 'edit'])->name('banners.edit');
    Route::post('banner/update', [BannerController::class, 'update'])->name('banners.update');
    Route::post('banner/inactive', [BannerController::class, 'inactive'])->name('banners.inactive');
    Route::post('banner/active', [BannerController::class, 'active'])->name('banners.active');
    Route::post('banner/destroy', [BannerController::class, 'destroy'])->name('banners.destroy');

    // contact routes
    Route::get('page/manage', [CreatePageController::class, 'index'])->name('pages.index');
    Route::get('page/create', [CreatePageController::class, 'create'])->name('pages.create');
    Route::post('page/save', [CreatePageController::class, 'store'])->name('pages.store');
    Route::get('page/{id}/edit', [CreatePageController::class, 'edit'])->name('pages.edit');
    Route::post('page/update', [CreatePageController::class, 'update'])->name('pages.update');
    Route::post('page/inactive', [CreatePageController::class, 'inactive'])->name('pages.inactive');
    Route::post('page/active', [CreatePageController::class, 'active'])->name('pages.active');
    Route::post('page/destroy', [CreatePageController::class, 'destroy'])->name('pages.destroy');

    // Products Category
    Route::get('category/manage', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::post('category/inactive', [CategoryController::class, 'inactive'])->name('category.inactive');
    Route::post('category/active', [CategoryController::class, 'active'])->name('category.active');
    Route::post('category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');


    // Products
    Route::get('product/manage', [ProductController::class, 'index'])->name('products.index');
    Route::get('product/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('product/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('product/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('product/update', [ProductController::class, 'update'])->name('products.update');
    Route::post('product/inactive', [ProductController::class, 'inactive'])->name('products.inactive');
    Route::post('product/active', [ProductController::class, 'active'])->name('products.active');
    Route::post('product/destroy', [ProductController::class, 'destroy'])->name('products.destroy');

    // Why Choose 
    Route::get('whychoose/manage', [WhyChooseController::class, 'index'])->name('whychoose.index');
    Route::get('whychoose/create', [WhyChooseController::class, 'create'])->name('whychoose.create');
    Route::post('whychoose/store', [WhyChooseController::class, 'store'])->name('whychoose.store');
    Route::get('whychoose/{id}/edit', [WhyChooseController::class, 'edit'])->name('whychoose.edit');
    Route::post('whychoose/update', [whychooseController::class, 'update'])->name('whychoose.update');
    Route::post('whychoose/inactive', [whychooseController::class, 'inactive'])->name('whychoose.inactive');
    Route::post('whychoose/active', [whychooseController::class, 'active'])->name('whychoose.active');
    Route::post('whychoose/destroy', [whychooseController::class, 'destroy'])->name('whychoose.destroy');


// Licese Logo 
    Route::get('license/manage', [LicenseController::class, 'index'])->name('license.index');
    Route::get('license/create', [LicenseController::class, 'create'])->name('license.create');
    Route::post('license/store', [LicenseController::class, 'store'])->name('license.store');
    Route::get('license/{id}/edit', [LicenseController::class, 'edit'])->name('license.edit');
    Route::post('license/update', [LicenseController::class, 'update'])->name('license.update');
    Route::post('license/inactive', [LicenseController::class, 'inactive'])->name('license.inactive');
    Route::post('license/active', [LicenseController::class, 'active'])->name('license.active');
    Route::post('license/destroy', [LicenseController::class, 'destroy'])->name('license.destroy');

    // commitment
    Route::get('commitment/manage', [CommitmentController::class, 'index'])->name('commitment.index');
    Route::get('commitment/create', [CommitmentController::class, 'create'])->name('commitment.create');
    Route::post('commitment/store', [CommitmentController::class, 'store'])->name('commitment.store');
    Route::get('commitment/{id}/edit', [CommitmentController::class, 'edit'])->name('commitment.edit');
    Route::post('commitment/update', [CommitmentController::class, 'update'])->name('commitment.update');
    Route::post('commitment/inactive', [CommitmentController::class, 'inactive'])->name('commitment.inactive');
    Route::post('commitment/active', [CommitmentController::class, 'active'])->name('commitment.active');
    Route::post('commitment/destroy', [CommitmentController::class, 'destroy'])->name('commitment.destroy');
});
