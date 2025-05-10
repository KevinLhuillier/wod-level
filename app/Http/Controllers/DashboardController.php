<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('dashboard', [
            'user' => $user
        ]);
    }

    public function reset()
    {
        $user = auth()->user();

        // Réinitialiser les données de l'utilisateur
        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'level' => 1,
                'xp' => 0,
                'rank' => 'Scaled'
            ]);

        // Réinitialiser les stages des compétences de l'utilisateur
        DB::table('users_skills')
            ->where('user_id', $user->id)
            ->update(['stage' => 1]);

        // Rediriger vers le tableau de bord
        return redirect()->route('dashboard')->with('status', 'User level and skills have been reset.');
    }
}
