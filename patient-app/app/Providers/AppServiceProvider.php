<?php

namespace App\Providers;

use App\Console\Contracts\IKinService;
use App\Console\Contracts\IMedicalService;
use App\Console\Contracts\IPatientService;
use App\Console\Contracts\IPersonService;
use App\Console\Contracts\IUserService;
use App\Http\Services\KinService;
use App\Http\Services\MedicalService;
use App\Http\Services\PatientService;
use App\Http\Services\PersonService;
use App\Http\Services\UserService;
use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind(IKinService::class, KinService::class);
        App::bind(IMedicalService::class, MedicalService::class);
        App::bind(IPatientService::class, PatientService::class);
        App::bind(IPersonService::class, PersonService::class);
        App::bind(IUserService::class, UserService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
    }
}
