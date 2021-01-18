<?php

namespace App\Helpers;

use App\Models\User;

class _Helper{

    # Clear user from other games
    public static function clearUser(User $user)
    {
        $user->current_game = 0;
        $user->is_finish = 0;
        $user->current_question = 0;
        $user->save();
        return true;
    }


}
