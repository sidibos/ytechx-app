<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\ContactUsMessage;
use App\Models\Project;
use App\Policies\ContactUsMessagePolicy;
use App\Policies\ProjectPolicy;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(ContactUsMessage::class, ContactUsMessagePolicy::class);
        Gate::policy(Project::class, ProjectPolicy::class);
    }
}
