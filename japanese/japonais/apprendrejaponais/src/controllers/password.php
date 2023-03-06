<?php

require_once __DIR__ . "/../models/autoload.php";
require_once __DIR__ . "/../models/class/user.class.php";

const ERROR_INPUT = "Ce champ est incorrect";
const ERROR_CHECK_PASSWORD = "Vos mots de passes ne correspondent pas";
const ERROR_INVALID_MAIL = "Mail non valide";


    function modifpassword()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $errors = [
            "currentpassword" => "",
            "newpassword" => ""
        ];

        // Retrieve user from session or database
        $user = null; // Replace with code to retrieve user from session or database

        // Check if user is authenticated
        if (!$user) {
            header("Location: index.php");
            exit;
        }

        $input = filter_input_array(INPUT_POST, [
            "currentpassword" => FILTER_SANITIZE_SPECIAL_CHARS,
            "newpassword" => FILTER_SANITIZE_SPECIAL_CHARS
        ]);

        $currentpassword = $input["currentpassword"] ?? "";
        $newpassword = $input["newpassword"] ?? "";

        $patternPassword = '/^(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';  // Pattern : 1 Majuscule , 8 caractères minimum, et un chiffre minimum

        if (empty($currentpassword)) {
            $errors["currentpassword"] = ERROR_INPUT;
        } else if ($currentpassword !== $user->password) {
            $errors["currentpassword"] = "password actuel incorrect";
        }

        if (empty($newpassword)) {
            $errors["newpassword"] = ERROR_INPUT;
        } else if (!preg_match($patternPassword, $newpassword)) {
            $errors["newpassword"] = "Une Majuscule, un chiffre, 8 caractères";
        }

        // Check if new password matches with the current password
        if ($newpassword === $currentpassword) {
            $errors["newpassword"] = "Le nouveau mot de passe ne peut pas être identique à l'ancien";
        }

        // Update user's password in database if there are no errors
        if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
            $user = new User();
            $user->modifpassword($currentpassword, $newpassword);
        }
    }

    require_once __DIR__ . "./../view/passwordView.php";
}




