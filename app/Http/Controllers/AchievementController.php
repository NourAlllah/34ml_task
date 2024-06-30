<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserAchievement;
use App\Models\Achievement;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendAchievementUnlockedEmail;

use Illuminate\Http\Request;

class AchievementController extends Controller
{

    public function getAchievements(User $user){
        $achievements_types = ['lesson' =>'lessons' ,'comment'=>'comments'];

        foreach ($achievements_types as $type => $user_data ) {
            
                $data = $user->$user_data;
                return $data;

        }
        
    }

    public static function checkUpdateAcheivement($type){

        $user = Auth::user();

        $achievements_types = ['lesson' =>'lessons' ,'comment'=>'comments'];

        $model_function = $achievements_types[$type];

        $user_data_actions = $user->$model_function;


        $userAchievements = Achievement::ofType($type)->get();

        
        foreach ($userAchievements as $userAchievement_data) {

            if ($userAchievement_data->threshold <= count($user_data_actions)) {

                $check_achievemnt_exist = UserAchievement::where('user_id', $user->id)
                            ->where('achievement_id', $userAchievement_data->id)
                            ->exists();

                if (!$check_achievemnt_exist) {

                    UserAchievement::create([
                        'user_id' => $user->id,
                        'achievement_id' => $userAchievement_data->id,
                    ]);

                    // job of email 
                        SendAchievementUnlockedEmail::dispatch($user, $userAchievement_data);
                    //
                }

            }

        }

    }
}
