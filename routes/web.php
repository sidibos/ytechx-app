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

// Route::get('/admin', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/contacts', [AdminContactMessageUsController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}', [AdminContactMessageUsController::class, 'show'])->name('contacts.show');
    Route::put('/contacts/{id}', [AdminContactMessageUsController::class, 'update'])->name('contacts.update');
});

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
//Route::post('/contact-us', [ContactUsMessageController::class, 'store'])->name('contact.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/admin', function () {
        return Inertia::render('Dashboard');
    })->name('admin');
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