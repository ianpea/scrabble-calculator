<?php

namespace Tests\Feature;

use App\Http\Controllers\ScoreController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScrabbleFeatureTest extends TestCase {
    use RefreshDatabase;

    public function test_score_can_be_saved(): void {
        $data = ['word' => 'CAT', 'score' => 5]; // correct score for word
        $response = $this->post('api/scores', $data);
        $response->assertStatus(201);
    }

    public function test_score_word_mismatch_error(): void {
        $data = ['word' => 'CAT', 'score' => 2]; // wrong score for word
        $response = $this->post('api/scores', $data);
        $response->assertStatus(400);
    }

    public function test_word_already_exists_error(): void {
        $data = ['word' => 'CAT', 'score' => 5]; // correct score for word
        $response = $this->post('api/scores', $data);
        $response->assertStatus(201);
        $response = $this->post('api/scores', $data);
        $response->assertExactJson(array('already_exists' => true));
    }

    public function test_loadable_top_score(): void {
        $response = $this->get('api/scores/top/10');
        $response->assertStatus(200);
    }
}
