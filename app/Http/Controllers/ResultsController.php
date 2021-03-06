<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Game;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultsController extends Controller
{


    public function index()
    {
        return view('pages.gameplay.answers', [
            'game' => $this->finishGame(),
            'user' => Auth::user(),
            'questions' => Question::all()
        ]);
    }

    public function finishGame()
    {
        $game = Game::find(Auth::user()->current_game);
        $game->restart = 0;
        $game->save();
        return $game;
    }


}
