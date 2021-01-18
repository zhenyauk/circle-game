<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Game;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameplayController extends Controller
{
    # 1
    public function index()
    {
        return view('pages.gameplay.index', [
            'game' => Game::find(Auth::user()->current_game)
        ] );
    }

    #2
    public function start(Request $request)
    {
        if($request->has('start')){
            $game = Game::find($request->start);
            if($game->user_id === Auth::id()){
                $game->start = 1;
                $game->save();
                return redirect()->route('start.index');
            }
        }
        return false;
    }

    #3
    public function startGame($qid = 1)
    {
        return view('pages.gameplay.start', [
            'game' => Game::find(Auth::user()->current_game),
            'question' => Question::find($qid)
        ] );
    }

    #4
    public function store(Request $request)
    {
        $answer = new Answer();

        $answer->game_id = Auth::user()->current_game;
        $answer->question_id = $request->qid;
        $answer->answer = $request->answer;
        $answer->real_user = Auth::id();

        // $next_user =  $this->getActiveNextUser( Auth::user()->current_game, Auth::id(),$request->qid);
        $answer->user_id = $this->getRandomUser($request->qid);
        $answer->save();

        # UPDATE USER
        Auth::user()->current_question = $request->qid;
        Auth::user()->save();

        $page = intval($answer->question_id) + 1;

        if($page <= Question::get()->count()){
            return redirect('/game/start/' . $page);
        } else {

            Auth::user()->is_finish = 1;
            Auth::user()->save();

            return redirect('/game/waiting-results' );
        }

    }

    public function getRandomUser($qid)
    {
        $users_array = User::where('current_game', Auth::user()->current_game)
            ->pluck('id')
            ->toArray();

        $user_id = $this->shuffleAll($users_array);

        if(
            $answ = Answer::whereQuestionId($qid)
                ->whereUserId($users_array[$user_id])
                ->whereGameId(Auth::user()->current_game)
                ->first()
        ){

            #if isset result already
            return $this->check($qid);
        } else {

            return $users_array[$user_id];

        }
    }

    public function check($qid)
    {
        return $this->getRandomUser($qid);
    }

    public function shuffleAll($users_array)
    {
        $user = array_rand($users_array, 1);
        return $user;
    }

    public function waiting()
    {

        if( User::where('current_game', Auth::user()->current_game)->where('is_finish', '!=', 1)->count() > 0){

            return view('pages.gameplay.start', [
                'game' => Game::find(Auth::user()->current_game),
                'question' => Question::latest('id')->first(),
                'finish' => 1
            ] );

        } else {
            $g = Game::find(Auth::user()->current_game);
            $g->compleat = 1;
            $g->save();

            return redirect('/game/results');
        }


    }

    public function getResults()
    {
        $res = Answer::whereUserId(Auth::id())->whereGameId(Auth::user()->current_game)->get();
        return $res;
    }




    // Next User
    public function getActiveNextUser($gid, $me, $q)
    {

        if($q === (int) 1){
            return $me;
        }


        $users_array = User::where('current_game', $gid)->pluck('id')->toArray();
        $u_count = 2;
        $steps = 6 / 2; # 3
        ####
        $q_count = 6;
        $j = 0;
        for($i=0; $i < $q_count; $i++){
            $j++;
            foreach ($users_array as $user){
                $q[$user][$i] = "  U[$user] Q[$j]  ";
                # $q[1][$1] = "  U1 Q1  ";
                # $q[2][$1] = "  U2 Q1  ";
                # $q[3][$1] = "  U3 Q1  ";
            }
        }



        ####
        $j = 0;
        for($i=0; $i < $q_count; $i++){
            $q[$j] = $i;

            if($i === $u_count){
                $j++;
                if($j > $steps){
                    break;
                }
            }

        }




        $last_user = max($users_array);

        $j = 0;
        if(count($users_array) < 6 ){

        }

        foreach ($users_array as $arr){

            //if($i === 1){
            //    return $arr;
            //}

            # if find current user in array
            if($arr === $me){


                if($arr === $last_user){
                    return min($users_array) ;
                }
                $i = 1;
            }
        }

    }
}
