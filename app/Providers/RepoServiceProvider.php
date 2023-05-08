<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Books\BooksInterface;
use App\Repository\Books\BooksRepository;
use App\Repository\Members\MembersInterface;
use App\Repository\Members\MembersRepository;
use App\Repository\Borrower\BorrowerInterface;
use App\Repository\Borrower\BorrowerRepository;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BooksInterface::class, BooksRepository::class);
        $this->app->bind(MembersInterface::class, MembersRepository::class);
        $this->app->bind(BorrowerInterface::class, BorrowerRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
