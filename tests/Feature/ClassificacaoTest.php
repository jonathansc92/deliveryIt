<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClassificacaoTest extends TestCase
{
    /** @test */
    public function lista_classificacao()
    {
        $response = $this->get('/api/classificacao/prova/1');

        $response->assertStatus(200);
    }

    /** @test */
    public function lista_classificacao_por_idade()
    {
        $response = $this->get('/api/classificacao/prova/1/18-25');

        $response->assertStatus(200);
    }
}
