<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthenticationControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_registers_a_user_and_returns_a_token()
    {
        $response = $this->postJson('api/register', [
            'username'  => 'johndoe',
            'firstname' => 'John',
            'lastname'  => 'Doe',
            'email'     => 'john@example.com',
            'password'  => 'secret123',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'token_type',
            ]);

        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
        ]);
    }

    /** @test */
    public function it_logs_in_a_user_and_returns_a_token()
    {
        $user = User::factory()->create([
            'email' => 'jane@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->postJson('api/login');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'token_type',
            ]);
    }

    /** @test */
    public function it_returns_authenticated_user()
    {
        $user = User::factory()->create();

        Sanctum::actingAs($user);

        $response = $this->getJson('api/me');

        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $user->id,
                'email' => $user->email,
            ]);
    }

    /** @test */
    public function it_logs_out_the_user()
    {
        $user = User::factory()->create();

        Sanctum::actingAs($user);

        $response = $this->postJson('api/logout');

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Déconnecté avec succès',
            ]);
    }
}
