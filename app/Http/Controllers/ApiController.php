<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function getOnlineUsers($gid)
    {
        $game = Game::find($gid);

        return json_encode([
            'users' => User::where('current_game', $game->id)->get()
        ]);
    }

    public function checkStart($gid)
    {
        $game = Game::find($gid);
        $start = 0;

        if($game->start === 1){
            $start = 1;
        }

        return json_encode([
            'status' => $start
        ]);
    }

    public function checkForResults()
    {
        if( User::where('current_game', Auth::user()->current_game)->where('is_finish', '!=', 1)->count() > 0){
            return json_encode(['status' => 'waiting']);
        } else {
            return json_encode(['status' => 'ok']);
        }
    }
}
