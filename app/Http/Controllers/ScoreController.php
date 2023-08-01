<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller {
    public function store(Request $request) {
        $score = $this->computeScore($request->word);
        if ($score != $request->score) {
            return response()->make("Score mismatch: " . $score . " and " . $request->score, 400);
        }

        $column = 'word';
        $exist = Score::where($column, '=', $request->word)->first();
        if ($exist != null) {
            return json_encode(['already_exists' => true], true);
        }
        return Score::firstOrCreate($request->all());
    }


    public function show($id) {
        return Score::find($id);
    }

    public function top(int $total) {
        return Score::orderBy('score', 'desc')->paginate($total);
    }

    public function topTest(Request $request) {
        $perPage = $request->query('perPage');
        $pageNo = $request->query('pageNo');
        return Score::orderBy('score', 'desc')->paginate($perPage, ['*'],  'page', $pageNo);
    }

    public function computeScore($word): int {
        $result = 0;
        $scoreMaps = Config::get('constants')['score_maps'];


        foreach (str_split($word) as $char) {
            foreach ($scoreMaps as $score => $list) {
                if (in_array($char, $list)) {
                    $result += $score;
                }
            }
        }
        return $result;
    }
}
