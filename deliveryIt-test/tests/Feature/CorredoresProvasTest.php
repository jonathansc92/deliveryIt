<?php

namespace Tests\Feature;

use App\CorredoresProvas;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CorredoresProvasTest extends TestCase
{
    /** @test */
    public function lista_corredores_provas()
    {
        $response = $this->get('/api/corredoresProvas/');

        $response->assertStatus(200);
    }

    /** @test */
    public function can_create_corredores_provas()
    {
        $corredores_provas = factory(CorredoresProvas::class)->create();
  
        $data = [
           'corredores_id' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
           'provas_id' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
        ];
  
        $this->post('/api/corredoresProvas/', $data)->assertStatus(200);
    }
  
    /** @test */
    public function can_update_corredores_provas()
    {
        $corredores_provas = factory(CorredoresProvas::class)->create();
  
        $data = [
            'corredores_id' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
            'provas_id' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
        ];
  
        $this->put('/api/corredoresProvas/' . $corredores_provas->id, $data)->assertStatus(200);
    }
  
    /** @test */
    public function can_delete_corredores_provas()
    {
        $corredores_provas = factory(CorredoresProvas::class)->create();
  
        $data = [
            'corredores_id' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
            'provas_id' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
        ];
  
        $this->delete('/api/corredoresProvas/' . $corredores_provas->id, $data)->assertStatus(200);
    }
  
    /** @test */
    public function can_show_corredores_provas()
    {
        $corredores_provas = factory(CorredoresProvas::class)->create();
  
        $data = [
           'corredores_id' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
           'provas_id' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
        ];
  
        $this->get('/api/corredoresProvas/' . $corredores_provas->id, $data)->assertStatus(200);
    }
}
