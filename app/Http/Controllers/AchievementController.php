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

        //unlocked_achievements (string[ ])

            $unlocked_achievements_data = UserAchievement::select('achievements.name', 'achievements.id' , 'achievements.type')
            ->join('achievements', 'user_achievements.achievement_id', '=', 'achievements.id')
            ->where('user_achievements.user_id', $user->id)
            ->get();
        
            $unlocked_achievements = []; //required
            
            foreach ($unlocked_achievements_data as $achievement) {
                $unlocked_achievements[] = $achievement['name'];
            }

        //next_available_achievements (string[ ])

            $groupedByType = [];
            foreach ($unlocked_achievements_data as $achievement) {
                $type = $achievement['type'];
                
                $groupedByType[$type][] = $achievement;
            }

            $highestByType = [];
            foreach ($groupedByType as $type => $achievements) {
                $highestByType[$type] = max(array_values(array_column($achievements, 'id', 'id')));
            }

            $next_available_achievements = []; //required

            foreach ($highestByType as $type => $id) {
                $achievements = Achievement::select('achievements.*')
                ->where('type', $type)
                ->where('id', $id+1)
                ->get();
                if (count($achievements) > 0) {
                    $next_available_achievements[] = $achievements->first()->name; 
                }
            }

        //  current_badge (string)         
        
        
            
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
