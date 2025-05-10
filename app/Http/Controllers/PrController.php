<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\UserPr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrController extends Controller
{
    public function create()
    {
        $userId = auth()->id(); // Récupérer l'ID de l'utilisateur connecté

        $skills = Skill::leftJoin('users_pr', function ($join) use ($userId) {
            $join->on('skills.id', '=', 'users_pr.skill_id')
                ->where('users_pr.user_id', '=', $userId);
        })
            ->select(
                'skills.id',
                'skills.name',
                'skills.type',
                'users_pr.pr_data',
                'users_pr.updated_at'
            )
            ->get();

        return view('pr', compact('skills'));
    }

    public function store(Request $request, $skillId)
    {
        $userId = auth()->id(); // Récupérer l'ID de l'utilisateur connecté

        // Validation des données
        $validated = $request->validate([
            'pr' => 'required|integer|min:0',
        ]);

        // Recherche de l'enregistrement existant
        $userPr = UserPr::where([
            ['user_id', '=', $userId],
            ['skill_id', '=', $skillId],
        ])->first();

        if ($userPr) {
            // Mise à jour si l'enregistrement existe
            $userPr->pr_data = $validated['pr'];
            $userPr->updated_at = now();
            $userPr->save();
        } else {
            // Création si l'enregistrement n'existe pas
            UserPr::create([
                'user_id' => $userId,
                'skill_id' => $skillId,
                'pr_data' => $validated['pr'],
                'updated_at' => now(),
            ]);
        }

        // Redirection avec un message de succès
        return redirect()->route('pr.create')->with([
            'success' => 'PR saved successfully!',
            'skill_id' => $skillId,
        ]);
    }
}
