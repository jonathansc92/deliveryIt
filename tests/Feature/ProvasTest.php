<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Provas;

class ProvasTest extends TestCase
{
    /** @test */
    public function lista_provas()
    {
        $response = $this->get('/api/provas/');

        $response->assertStatus(200);
    }

    /** @test */
    public function can_create_provas()
    {
        $data = [
            'tipo_prova' => 5,
            'data' => '2021-03-01'
        ];

        $this->post('/api/provas/', $data)
            ->assertStatus(200);
    }

     /** @test */
    public function can_update_provas()
    {
        $provas = factory(Provas::class)->create();

        $data = [
            'tipo_prova' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
            'data' => $this->faker->date($format = 'Y-m-d', $max = 'now')
        ];

        $this->put('/api/provas/' . $provas->id, $data)
            ->assertStatus(200);
    }

     /** @test */
    public function can_delete_provas()
    {
        $provas = factory(Provas::class)->create();

        $data = [
            'tipo_prova' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
            'data' => $this->faker->date($format = 'Y-m-d', $max = 'now')
        ];

        $this->delete('/api/provas/' . $provas->id, $data)
            ->assertStatus(200);
    }

     /** @test */
    public function can_show_provas()
    {
        $provas = factory(Provas::class)->create();

        $data = [
            'tipo_prova' => $this->faker->biasedNumberBetween($min = 0, $max = 100, $function = 'sqrt'),
            'data' => $this->faker->date($format = 'Y-m-d', $max = 'now')
        ];

        $this->get('/api/provas/' . $provas->id, $data)
            ->assertStatus(200);
    }
}
