<?php

use App\Http\Controllers\LivrosController;
use App\Http\Requests\CMS\LivroRequest;
use Tests\TestCase;
use Mockery;
use App\Services\Livro\LivroServiceInterface;

class LivrosControllerTest extends TestCase
{
    public function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testTodosLivrosRetornaStatus401QuandoNaoPassaToken()
    {
        $livroService = Mockery::mock(LivroServiceInterface::class);
        $livroService->shouldReceive('todosLivros')->andReturn(collect());

        $this->app->instance(LivroServiceInterface::class, $livroService);

        $response = $this->withHeaders(['Accept' => 'application/json'])->get('/api/livro');

        $response->assertStatus(401)
            ->assertJsonStructure([
                "message"
            ]);
    }

    public function testTodosLivrosRetornaStatus204QuandoVazio()
    {
        $livroService = Mockery::mock(LivroServiceInterface::class);
        $livroService->shouldReceive('todosLivros')->andReturn(collect());

        $this->app->instance(LivroServiceInterface::class, $livroService);

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => config('tests.auth.token')
        ])->get('/api/livro');

        $response->assertStatus(204);
    }

    public function testTodosLivrosRetornaStatus200()
    {
        $livroService = Mockery::mock(LivroServiceInterface::class);
        $livroService->shouldReceive('todosLivros')->andReturn(collect(config('tests.livros.livroResponse.200')));

        $this->app->instance(LivroServiceInterface::class, $livroService);

        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => config('tests.auth.token')
        ])->get('/api/livro');

        $response->assertStatus(200)
            ->assertExactJson(config('tests.livros.livroResponse.200'));
    }

    public function testAdicaoDeLivroComDadosIncorretos()
    {
        $livroService = Mockery::mock(LivroServiceInterface::class);
        $livroService->shouldReceive('addLivro')->andReturn(collect());

        $controller = new LivrosController($livroService);

        $request = app(LivroRequest::class);
        $request = $request->setJson(config('tests.livros.livroPayload.400'));

        $response = $controller->addLivro($request);
        $this->assertEquals(400, $response->getStatusCode());

        $this->assertEquals('Não foi possível adicionar livro', json_decode($response->getContent(), true)['message']);
    }

    public function testAdicaoDeLivroComDadosCorretos()
    {
        $livroService = Mockery::mock(LivroServiceInterface::class);
        $livroService->shouldReceive('addLivro')->andReturn(collect(config('tests.livros.livroDataValidation.201')));

        $controller = new LivrosController($livroService);

        $request = app(LivroRequest::class);
        $request = $request->setJson(config('tests.livros.livroPayload.201'));

        $response = $controller->addLivro($request);
        $this->assertEquals(201, $response->getStatusCode());

        $this->assertEquals(config('tests.livros.livroResponse.201'), json_decode($response->getContent(), true)['message']);
    }
}
