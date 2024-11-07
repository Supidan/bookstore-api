<?php

namespace App\Providers;

use App\Interfaces\BookCategoryRepositoryInterface;
use App\Interfaces\BookCategoryServiceInterface;
use App\Interfaces\BookLoanRepositoryInterface;
use App\Interfaces\BookLoanServiceInterface;
use App\Interfaces\BookRepositoryInterface;
use App\Interfaces\BookServiceInterface;
use App\Repositories\BookCategoryRepository;
use App\Repositories\BookLoanRepository;
use App\Repositories\BookRepository;
use App\Services\BookCategoryService;
use App\Services\BookLoanService;
use App\Services\BookService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        BookCategoryServiceInterface::class => BookCategoryService::class,
        BookServiceInterface::class => BookService::class,
        BookLoanServiceInterface::class => BookLoanService::class,

        BookCategoryRepositoryInterface::class => BookCategoryRepository::class,
        BookRepositoryInterface::class => BookRepository::class,
        BookLoanRepositoryInterface::class => BookLoanRepository::class
    ];

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
        //
    }
}
