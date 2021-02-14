<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Resultados;

class ResultadosTest extends TestCase
{
    /** @test */
    public function lista_resultados()
    {
        $response = $this->get('/api/resultados/');

        $response->assertStatus(200);
    }

    /** @test */
    public function can_create_resultados()
    {
       $resultados = factory(Resultados::class)->create();
 
        $data = [
           'corredores_id' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
           'provas_id' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
           'hora_inicio' => $this->faker->time($format = 'H:i:s', $max = 'now'),
           'hora_conclusao' => $this->faker->time($format = 'H:i:s', $max = 'now'),
        ];
 
        $this->post('/api/resultados/', $data)->assertStatus(200);
    }
 
    /** @test */
    public function can_update_resultados()
    {
        $resultados = factory(Resultados::class)->create();
 
        $data = [
            'corredores_id' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
            'provas_id' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
            'hora_inicio' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'hora_conclusao' => $this->faker->time($format = 'H:i:s', $max = 'now'),
        ];
 
        $this->put('/api/resultados/' . $resultados->id, $data)->assertStatus(200);
    }
 
    /** @test */
    public function can_delete_resultados()
    {
        $resultados = factory(Resultados::class)->create();
 
        $data = [
            'corredores_id' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
            'provas_id' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
            'hora_inicio' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'hora_conclusao' => $this->faker->time($format = 'H:i:s', $max = 'now'),
        ];
 
        $this->delete('/api/resultados/' . $resultados->id, $data)->assertStatus(200);
    }
 
    /** @test */
    public function can_show_resultados()
    {
        $resultados = factory(Resultados::class)->create();
 
        $data = [
            'corredores_id' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
            'provas_id' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
            'hora_inicio' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'hora_conclusao' => $this->faker->time($format = 'H:i:s', $max = 'now'),
        ];
 
        $this->get('/api/resultados/' . $resultados->id, $data)->assertStatus(200);
     }
}
