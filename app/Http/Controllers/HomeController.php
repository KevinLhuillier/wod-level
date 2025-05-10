<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $xpNextLevel = DB::table('xp_level')
            ->where('xp_level.level', '=', $user->level)
            ->value('xp_level.xp');

        if ($user->level == 1) {
            $xpPreviousLevel = 0; // Assuming level 1 has no previous level
        } else {
            $xpPreviousLevel = DB::table('xp_level')
                ->where('xp_level.level', '=', $user->level - 1)
                ->value('xp_level.xp');
        }

        $xpPercentage = ($user->xp - $xpPreviousLevel) / ($xpNextLevel - $xpPreviousLevel) * 100;

        // Retrieve the 3 tasks with the lowest stage and their corresponding stage_label
        // for the authenticated user
//        $nextTasks = DB::table('users_skills')
//            ->join('skills', 'users_skills.skill_id', '=', 'skills.id')
//            ->join('skills_stages', function ($join) {
//                $join->on('users_skills.stage', '=', 'skills_stages.stage')
//                    ->on('users_skills.skill_id', '=', 'skills_stages.skill_id');
//            })
//            ->join('xp_stage', 'users_skills.stage', '=', 'xp_stage.stage')
//            ->where('users_skills.user_id', $user->id)
//            ->orderBy('users_skills.stage', 'asc')
//            ->limit(3)
//            ->select('skills.name','skills_stages.skill_id', 'skills_stages.stage', 'skills_stages.stage_label', 'xp_stage.xp')
//            ->get();

        $weightTask = DB::table('users_skills')
            ->join('skills', 'users_skills.skill_id', '=', 'skills.id')
            ->join('skills_stages', function ($join) {
                $join->on('users_skills.stage', '=', 'skills_stages.stage')
                    ->on('users_skills.skill_id', '=', 'skills_stages.skill_id');
            })
            ->join('xp_stage', 'users_skills.stage', '=', 'xp_stage.stage')
            ->where('users_skills.user_id', $user->id)
            ->where('skills.type', '=', 'Weightlifting')
            ->orderBy('users_skills.stage', 'asc')
            ->select('skills.name', 'users_skills.skill_id', 'users_skills.stage', 'skills_stages.stage_label', 'xp_stage.xp')
            ->first();

        $gymTask = DB::table('users_skills')
            ->join('skills', 'users_skills.skill_id', '=', 'skills.id')
            ->join('skills_stages', function ($join) {
                $join->on('users_skills.stage', '=', 'skills_stages.stage')
                    ->on('users_skills.skill_id', '=', 'skills_stages.skill_id');
            })
            ->join('xp_stage', 'users_skills.stage', '=', 'xp_stage.stage')
            ->where('users_skills.user_id', $user->id)
            ->where('skills.type', '=', 'Gym')
            ->orderBy('users_skills.stage', 'asc')
            ->select('skills.name', 'users_skills.skill_id', 'users_skills.stage', 'skills_stages.stage_label', 'xp_stage.xp')
            ->first();

        $cardioTask = DB::table('users_skills')
            ->join('skills', 'users_skills.skill_id', '=', 'skills.id')
            ->join('skills_stages', function ($join) {
                $join->on('users_skills.stage', '=', 'skills_stages.stage')
                    ->on('users_skills.skill_id', '=', 'skills_stages.skill_id');
            })
            ->join('xp_stage', 'users_skills.stage', '=', 'xp_stage.stage')
            ->where('users_skills.user_id', $user->id)
            ->where('skills.type', '=', 'Cardio')
            ->orderBy('users_skills.stage', 'asc')
            ->select('skills.name', 'users_skills.skill_id', 'users_skills.stage', 'skills_stages.stage_label', 'xp_stage.xp')
            ->first();


        // Retrieve all tasks and their corresponding stage_label
        // for the authenticated user
        $allTasks = DB::table('users_skills')
            ->join('skills', 'users_skills.skill_id', '=', 'skills.id')
            ->join('skills_stages', function ($join) {
                $join->on('users_skills.stage', '=', 'skills_stages.stage')
                    ->on('users_skills.skill_id', '=', 'skills_stages.skill_id');
            })
            ->join('xp_stage', 'users_skills.stage', '=', 'xp_stage.stage')
            ->where('users_skills.user_id', $user->id)
            ->orderBy('users_skills.stage', 'asc')
            ->select('skills.name','skills_stages.skill_id', 'skills_stages.stage', 'skills_stages.stage_label', 'xp_stage.xp')
            ->get();

        return view('home', compact('user', 'gymTask', 'allTasks', 'weightTask', 'cardioTask', 'xpNextLevel', 'xpPercentage'));
    }

    public function completeStage($skill, $stage)
    {
        $user = auth()->user();

        // Incrémenter le stage dans la table users_skills
        DB::table('users_skills')
            ->where('user_id', $user->id)
            ->where('skill_id', $skill)
            ->where('stage', $stage)
            ->increment('stage');

        // Récupérer l'XP correspondant au skill et stage validé
        $xp = DB::table('xp_stage')
            ->where('stage', $stage)
            ->value('xp');

        // Ajouter l'XP à l'utilisateur
        DB::table('users')
            ->where('id', $user->id)
            ->increment('xp', $xp);

        // Vérifier si l'utilisateur a atteint le niveau suivant
        // Récupérer l'XP correspondant au niveau actuel de l'utilisateur
        $currentLevelXp = DB::table('xp_level')
            ->where('level', $user->level)
            ->value('xp');

        $newXp = DB::table('users')
            ->where('id', $user->id)
            ->value('xp');

        // Vérifier si l'XP de l'utilisateur est supérieur ou égal à l'XP du niveau actuel
        if ($newXp >= $currentLevelXp) {
            // Trouver le niveau le plus élevé où l'XP de l'utilisateur est inférieure à l'XP du niveau suivant
            $newLevel = DB::table('xp_level')
                ->where('xp', '<=', $newXp)
                ->orderBy('level', 'desc')
                ->value('level');

            // Mettre à jour le niveau de l'utilisateur si nécessaire
            if (($newLevel + 1) > $user->level) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['level' => ($newLevel + 1)]);
            }

            //Todo: A optimiser car la requête est faite à chaque fois à partir du rang Inter
            if(($newLevel + 1) > 15) {

                // Mettre à jour le rank de l'utilisateur
                if (($newLevel + 1) >= 15 && ($newLevel + 1) < 40) {
                    $newRank = 'Inter';
                } else if ($newLevel + 1 >= 40) {
                    $newRank = 'RX';
                }

                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['rank' => $newRank]);
            }
        }

        // Recharger la méthode index pour mettre à jour les données
        return redirect()->route('home');
    }
}
