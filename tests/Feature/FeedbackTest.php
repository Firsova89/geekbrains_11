<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_available_feedback_url()
    {
        $response = $this->get('/feedback');

        $response->assertStatus(200);
    }

    public function test_post_feedback_ok()
    {
        $response = $this->post('/feedback', ['name' => 'name123', 'feedback' => 'feedback123']);
        $response->assertStatus(302);
        $response->assertRedirect('/feedback');
    }
    public function test_post_feedback_no_feedback()
    {
        $response = $this->post('/feedback', ['name' => 'na']);
        $response->assertStatus(302);
        $response->assertRedirect('/feedback');
    }
    public function test_post_feedback_no_name()
    {
        $response = $this->post('/feedback', ['feedback' => 'feedback123']);
        $response->assertStatus(302);
        $response->assertRedirect('/feedback');
    }
    public function test_post_feedback_no_data()
    {
        $response = $this->post('/feedback', );
        $response->assertStatus(302);
        $response->assertRedirect('/feedback');
    }
}
