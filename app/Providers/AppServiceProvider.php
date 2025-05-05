<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useTailwind();

        Builder::macro('search', function ($fields, $string) {
            if (!$string) return $this;

            return $this->where(function ($query) use ($fields, $string) {
                foreach ((array) $fields as $field) {
                    $query->orWhere($field, 'like', '%' . $string . '%');
                }
            });
        });
    }
}
