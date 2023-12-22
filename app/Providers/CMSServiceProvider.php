<?php

namespace App\Providers;

use App\Repositories\Assunto\AssuntoRepository;
use App\Repositories\Assunto\AssuntoRepositoryInterface;
use App\Repositories\Autor\AutorRepository;
use App\Repositories\Autor\AutorRepositoryInterface;
use App\Repositories\Livro\LivroRepository;
use App\Repositories\Livro\LivroRepositoryInterface;
use App\Repositories\Usuario\UsuarioRepository;
use App\Repositories\Usuario\UsuarioRepositoryInterface;
use App\Services\Assunto\AssuntoService;
use App\Services\Assunto\AssuntoServiceInterface;
use App\Services\Autor\AutorService;
use App\Services\Autor\AutorServiceInterface;
use App\Services\Livro\LivroService;
use App\Services\Livro\LivroServiceInterface;
use App\Services\Usuario\UsuarioService;
use App\Services\Usuario\UsuarioServiceInterface;
use Illuminate\Support\ServiceProvider;

class CMSServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            LivroServiceInterface::class,
            LivroService::class
        );

        $this->app->bind(
            AutorServiceInterface::class,
            AutorService::class
        );

        $this->app->bind(
            AssuntoServiceInterface::class,
            AssuntoService::class
        );

        $this->app->bind(
            LivroRepositoryInterface::class,
            LivroRepository::class
        );

        $this->app->bind(
            AutorRepositoryInterface::class,
            AutorRepository::class
        );

        $this->app->bind(
            AssuntoRepositoryInterface::class,
            AssuntoRepository::class
        );

        $this->app->bind(
            UsuarioServiceInterface::class,
            UsuarioService::class
        );

        $this->app->bind(
            UsuarioRepositoryInterface::class,
            UsuarioRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
