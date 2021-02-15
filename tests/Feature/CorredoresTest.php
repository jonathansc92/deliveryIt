<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Corredores;

class CorredoresTest extends TestCase
{
    /** @test */
    public function lista_corredores()
    {
        $response = $this->get('/api/corredores/');

        $response->assertStatus(200);
    }

      /** @test */
    public function can_create_corredores()
    {
      $corredores = factory(Corredores::class)->create();
 
      $data = [
        'nome' => $this->faker->shuffleString($string = 'Teste', $encoding = 'UTF-8'),
        'cpf' => $this->faker->numberBetween($min = 0, $max = 21474836478),
        'data_nascimento' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
      ];
  
      $this->post('/api/corredores/', $data)->assertStatus(200);
    }
  
    /** @test */
    public function can_update_corredores()
    {
      $corredores = factory(Corredores::class)->create();
  
      $data = [
        'nome' => $this->faker->shuffleString($string = 'Teste', $encoding = 'UTF-8'),
        'cpf' => $this->faker->numberBetween($min = 0, $max = 21474836478),
        'data_nascimento' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
      ];
  
      $this->put('/api/corredores/' . $corredores->id, $data)->assertStatus(200);
    }
  
    /** @test */
    public function can_delete_corredores()
    {
      $corredores = factory(Corredores::class)->create();
  
      $data = [
        'nome' => $this->faker->shuffleString($string = 'Teste', $encoding = 'UTF-8'),
        'cpf' => $this->faker->numberBetween($min = 0, $max = 21474836478),
        'data_nascimento' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
      ];
  
      $this->delete('/api/corredores/' . $corredores->id, $data)->assertStatus(200);
    }
  
    /** @test */
    public function can_show_corredores()
    {
      $corredores = factory(Corredores::class)->create();
  
      $data = [
        'nome' => $this->faker->shuffleString($string = 'Teste', $encoding = 'UTF-8'),
        'cpf' => $this->faker->numberBetween($min = 0, $max = 21474836478),
        'data_nascimento' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
      ];
  
      $this->get('/api/corredores/' . $corredores->id, $data)->assertStatus(200);
    }
}
