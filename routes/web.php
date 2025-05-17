<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Page;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactUsMessageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\AdminContactUsMessageController;
use App\Http\Controllers\Auth\AuthRegisteredUserController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\QuoteController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/contacts', [AdminContactUsMessageController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}', [AdminContactUsMessageController::class, 'show'])->name('contacts.show');
    Route::put('/contacts/{id}', [AdminContactUsMessageController::class, 'update'])->name('contacts.update');

    Route::resource('quotes', Admin\QuoteController::class);
    Route::resource('projects', Admin\ProjectController::class)->names([
        'index' => 'projects.index',
        'create' => 'projects.create',
        'store' => 'projects.store',
        'show' => 'projects.show',
        'edit' => 'projects.edit',
        'update' => 'projects.update',
        'destroy' => 'projects.destroy',
    ]);
    Route::resource('contracts', Admin\ContractController::class);
    Route::resource('squads', Admin\SquadController::class);
    Route::resource('modules', Admin\ModuleController::class);
    Route::resource('tasks', Admin\TaskController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/quotes/create-from-message/{id}', [QuoteController::class, 'createFromMessage'])->name('quotes.createFromMessage');
});


// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', fn () => Inertia::render('Dashboard'));

//     Route::middleware('role:tech_expert')->group(function () {
//         Route::get('/expert-panel', [ExpertController::class, 'index']);
//     });

//     // Route::middleware('role:customer')->group(function () {
//     //     Route::get('/customer-orders', [CustomerController::class, 'orders']);
//     // });

//     Route::middleware('role:admin')->group(function () {
//         Route::get('/admin', [AdminController::class, 'dashboard']);
//     });
// });

Route::get('/', function () {
    return Inertia::render('YTechXWelcome', [
        'canLogin' => true,
        'canRegister' => true,
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/about-us', [AboutUsController::class, 'show'])->name('about-us');

//Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');

Route::get('/contact-us', [ContactUsMessageController::class, 'create'])->name('contact.create');
Route::post('/register-expert', [AuthRegisteredUserController::class, 'store'])->name('expert.store');
//Route::get('/register', [AuthRegisteredUserController::class, 'store'])->name('register');
//Route::post('/contact-us', [ContactUsMessageController::class, 'store'])->name('contact.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


    // Route::get('/admin', function () {
    //     return Inertia::render('Dashboard');
    // })->name('admin');
});

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::resource('pages', PageController::class)->except('show');
});

// Public-facing page route
// Route::get('/pages/{slug}', function ($slug) {
//     $page = Page::where('slug', $slug)->firstOrFail();
//     return Inertia::render('Page/Show', ['page' => $page]);
// });

Route::get('/pages/privacy-policy', function () {
    return Inertia::render('PrivacyPolicy');
});

Route::get('/pages/terms-of-service', function () {
    return Inertia::render('TermsOfService');
});