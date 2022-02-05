<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LivroTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->get('/login')->assertStatus(200);
    }

    public function testRegister()
    {
        $this->get('/registration')->assertStatus(200);
    }

    public function testDashboard()
    {
        $this->get('/dashboard')->assertStatus(200);
    }

}
