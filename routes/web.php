<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ShowcaseController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\EventgallaryController;
use App\Http\Controllers\Admin\HeaderBannerController;

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\EventController as FrontEventController;
use App\Http\Controllers\Front\ContactController as FrontContactController;
use App\Http\Controllers\Front\BlogController as FrontBlogController;

use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Route::get('/welcome', function () {
    if (!file_exists(public_path('storage'))) {
        Artisan::call('storage:link');
        echo "Storage link created.<br>";
    }
    // Artisan::call('migrate');
    Artisan::call('migrate', ['--force' => true]);
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    echo "All migrate cleared.<br>";
    echo nl2br(Artisan::output());
});

Route::get('/create-symlink', function () {
    $target = storage_path('app/public');  // Target folder where files are stored
    $link = public_path('storage');        // Symlink location

    // Check if symlink exists already
    if (is_link($link)) {
        return 'Symlink already exists and points to: ' . readlink($link);
    } else {
        // Check if there's already a directory or file at the symlink location
        if (file_exists($link)) {
            // Remove the existing directory or file
            try {
                // If it's a directory, remove its contents and then the directory
                if (is_dir($link)) {
                    deleteDirectory($link); // Custom recursive function to delete all files/subdirectories
                } else {
                    unlink($link); // Remove file if it's a regular file
                }
                return 'Existing file or directory removed. Now attempting to create the symlink.';
            } catch (Exception $e) {
                return 'Failed to remove existing file/directory. Error: ' . $e->getMessage();
            }
        }

        // Create the symlink after ensuring there's no existing file or folder
        if (symlink($target, $link)) {
            return 'Symlink created successfully!';
        } else {
            return 'Failed to create symlink.';
        }
    }
});

// Recursive function to delete a directory and its contents
function deleteDirectory($dir)
{
    if (!is_dir($dir)) {
        return;
    }

    $files = array_diff(scandir($dir), array('.', '..'));

    foreach ($files as $file) {
        $filePath = $dir . DIRECTORY_SEPARATOR . $file;
        is_dir($filePath) ? deleteDirectory($filePath) : unlink($filePath);
    }

    rmdir($dir); // Now that the directory is empty, we can remove it
}

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/privacy', [FrontController::class, 'privacy'])->name('privacy');

Route::get('/event', [FrontEventController::class, 'event'])->name('event');
Route::get('/event/load-images', [FrontEventController::class, 'loadImages'])->name('event.load');

Route::get('/contact', [FrontContactController::class, 'contact'])->name('contact');
Route::post('/contact-form', [FrontContactController::class, 'contactForm'])->name('contact-form');

Route::get('/blog', [FrontBlogController::class, 'blog'])->name('blog');
Route::get('/blog-details/{slug}', [FrontBlogController::class, 'blogDetails'])->name('blog-detail');



Route::prefix('admin')->name('admin.')->group(function () {
    // ❌ No middleware for login routes
    Route::get('login', [AdminController::class, 'adminLogin'])->name('login');
    Route::post('logincheck', [AdminController::class, 'loginCheck']);

    Route::middleware(AdminCheckMiddleware::class)->group(function () {
        //Dashboard
        Route::get('dashboard/', [DashboardController::class, 'dashboard'])->name('dashboard');

        //Blog
        Route::get('blog-add/{id?}', [BlogController::class, 'addBlog'])->name('blog.add');
        Route::get('blog-list', [BlogController::class, 'blogList'])->name('blog.list');
        Route::post('blog-store/{id?}', [BlogController::class, 'storeBlog'])->name('blog.store');
        Route::post('blog-delete/{id}', [BlogController::class, 'deleteBlog'])->name('blog.delete');

        //BlogCategories
        Route::get('blogCategory-add/{id?}', [BlogCategoryController::class, 'addBlogCategory'])->name('blogCategory.add');
        Route::get('blogCategory-list', [BlogCategoryController::class, 'blogCategoryList'])->name('blogCategory.list');
        Route::post('blogCategory-store/{id?}', [BlogCategoryController::class, 'storeBlogCategory'])->name('blogCategory.store');
        Route::post('blogCategory-delete/{id}', [BlogCategoryController::class, 'deleteBlogCategory'])->name('blogCategory.delete');

        //About
        Route::get('about-add/{id?}', [AboutController::class, 'addAbout'])->name('about.add');
        Route::get('about-list', [AboutController::class, 'aboutList'])->name('about.list');
        Route::post('about-store/{id?}', [AboutController::class, 'storeAbout'])->name('about.store');
        Route::post('about-delete/{id}', [AboutController::class, 'deleteAbout'])->name('about.delete');

        //what we offer
        Route::get('service-add/{id?}', [ServiceController::class, 'addService'])->name('service.add');
        Route::get('service-list', [ServiceController::class, 'serviceList'])->name('service.list');
        Route::post('service-store/{id?}', [ServiceController::class, 'storeService'])->name('service.store');
        Route::post('service-delete/{id}', [ServiceController::class, 'deleteService'])->name('service.delete');

        //Event
        Route::get('event-add/{id?}', [EventController::class, 'addEvent'])->name('event.add');
        Route::get('event-list', [EventController::class, 'eventList'])->name('event.list');
        Route::post('event-store/{id?}', [EventController::class, 'storeEvent'])->name('event.store');
        Route::post('event-delete/{id}', [EventController::class, 'deleteEvent'])->name('event.delete');


        //Team
        Route::get('team-add/{id?}', [TeamController::class, 'addTeam'])->name('team.add');
        Route::get('team-list', [TeamController::class, 'teamList'])->name('team.list');
        Route::post('team-store/{id?}', [TeamController::class, 'storeTeam'])->name('team.store');
        Route::post('team-delete/{id}', [TeamController::class, 'deleteTeam'])->name('team.delete');

        //banner
        Route::get('banner-add/{id?}', [BannerController::class, 'addBanner'])->name('banner.add');
        Route::get('banner-list', [BannerController::class, 'bannerList'])->name('banner.list');
        Route::post('banner-store/{id?}', [BannerController::class, 'storeBanner'])->name('banner.store');
        Route::post('banner-delete/{id}', [BannerController::class, 'deleteBanner'])->name('banner.delete');

        //showcase
        Route::get('showcase-add/{id?}', [ShowcaseController::class, 'addShowcase'])->name('showcase.add');
        Route::get('showcase-list', [ShowcaseController::class, 'showcaseList'])->name('showcase.list');
        Route::post('showcase-store/{id?}', [ShowcaseController::class, 'storeShowcase'])->name('showcase.store');
        Route::post('showcase-delete/{id}', [ShowcaseController::class, 'deleteShowcase'])->name('showcase.delete');

        //setting
        Route::get('setting/{id?}', [SettingController::class, 'addSetting'])->name('setting');
        Route::post('setting-store/{id?}', [SettingController::class, 'storeSetting'])->name('setting.store');

        //Event feature
        Route::get('feature-add/{id?}', [FeatureController::class, 'addFeature'])->name('feature.add');
        Route::get('feature-list', [FeatureController::class, 'featureList'])->name('feature.list');
        Route::post('feature-store/{id?}', [FeatureController::class, 'storeFeature'])->name('feature.store');
        Route::post('feature-delete/{id}', [FeatureController::class, 'deleteFeature'])->name('feature.delete');

        //Event gallary
        Route::get('eventgallary-add/{id?}', [EventgallaryController::class, 'addEventgallary'])->name('eventgallary.add');
        Route::get('eventgallary-list', [EventgallaryController::class, 'eventgallaryList'])->name('eventgallary.list');
        Route::post('eventgallary-store/{id?}', [EventgallaryController::class, 'storeEventgallary'])->name('eventgallary.store');
        Route::post('eventgallary-update/{id?}', [EventgallaryController::class, 'updateEventgallary'])->name('eventgallary.update');
        Route::post('eventgallary-delete/{id}', [EventgallaryController::class, 'deleteEventgallary'])->name('eventgallary.delete');

        // header banner
        Route::get('headerbanner-add/{id?}', [HeaderBannerController::class, 'addHeaderBanner'])->name('headerbanner.add');
        Route::get('headerbanner-list', [HeaderBannerController::class, 'headerbannerList'])->name('headerbanner.list');
        Route::post('headerbanner-store/{id?}', [HeaderBannerController::class, 'storeHeaderBanner'])->name('headerbanner.store');
        Route::post('headerbanner-delete/{id}', [HeaderBannerController::class, 'deleteHeaderBanner'])->name('headerbanner.delete');


        Route::get('logout', [AdminController::class, 'logout'])->name('logout');

    });
});




