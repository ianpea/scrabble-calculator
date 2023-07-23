<?php

namespace Tests\Unit;

use App\Http\Controllers\ScoreController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ScrabbleUnitTest extends TestCase {
    use RefreshDatabase;

    public function test_compute_score_is_correct(): void {
        $data = ['word' => 'CAT', 'score' => 5]; // correct score for word
        $scoreControllerInstance = new ScoreController();
        $response = $scoreControllerInstance->computeScore($data['word']);
        $this->assertEquals(5, $response);
    }
}
