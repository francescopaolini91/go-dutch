<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_register()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'test@example.it',
            'password' => 'password'
        ];

        $response = $this->postJson('/api/register', $userData);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'user' => [
                'id',
                'name',
                'email',
                'created_at',
                'updated_at'
            ],
            'access_token',
            'code'
        ]);
    }

    public function test_login()
    {
        $userData = [
            'email' => 'test@99.it',
            'password' => 'test1234'
        ];

        $response = $this->postJson('/api/login', $userData);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'user' => [
                'id',
                'name',
                'email',
                'created_at',
                'updated_at'
            ],
            'access_token',
            'code'
        ]);
    }
}
