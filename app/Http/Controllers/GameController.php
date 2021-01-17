<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Game;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GameController extends Controller
{
    public function index()
    {
        return view('pages.game.index', [
            'games' => Game::where('is_new', 1)->get()
        ]);
    }

    public function clear()
    {
        Answer::truncate();
        return redirect('/game/start');
    }

    public function joinGame(Game $game)
    {
        Auth::user()->current_game = $game->id;
        Auth::user()->save();
        return redirect()->route('gameplay.index');
    }

    public function create()
    {
        return view('pages.game.create');
    }

    public function store(Request $request)
    {
        # Check the same name
        $this->checkGame($request);

        $game = new Game();
        $game->name = $request->name;
        $game->user_id = Auth::id();
        $game->save();

        Auth::user()->current_game = $game->id;
        Auth::user()->save();

        return redirect()->route('gameplay.index');
    }

    public function checkGame($request)
    {
        if($g = Game::whereName($request->name)->first()){
            $g->name = $g->name . '__' . Str::random(5);
            $g->compleat = 1;
            $g->is_new = 0;
            $g->save();
        }
        return true;
    }

    public function compleat($gid)
    {
        $game = Game::find();
        //
    }
}
