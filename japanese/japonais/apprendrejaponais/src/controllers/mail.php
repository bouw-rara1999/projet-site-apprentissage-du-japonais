<?php

namespace App\Http\Controllers;

use App\Models\User;
use Database;
use Illuminate\Http\Request;


{
    public function modifmail($request)
    {
        $currentMail = trim($request->input('currentmail'));
        $newMail = filter_var(trim($request->input('newmail')), FILTER_SANITIZE_EMAIL);
        $modalTitle = 'Erreur';
        $user = new User();

        if ($user->mailExistsInDb($currentMail)) {
            if (!$user->mailExistsInDb($newMail)) {
                try {
                    $user->updateMail($currentMail, $newMail);
                    $result1 = "Le changement de mail a été effectué avec succès.";
                    $modalTitle = 'Succès';
                } catch (\PDOException $e) {
                    $result1 = "Une erreur inattendue est survenue.";
                }
            } else {
                $result1 = "Cette adresse email est déjà utilisée par un autre utilisateur.";
            }
        } else {
            $result1 = "L'adresse email à modifier n'existe pas.";
        }

        return response()->json(['message' => $result1, 'modalTitle' => $modalTitle]);
    }
}
