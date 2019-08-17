<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegistrationTest extends TestCase
{
    /** @test */
    public function a_user_can_registeer()
    {
        $response = $this->json('post', '/register', []);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }

}
