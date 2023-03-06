<?php

require_once __DIR__ . './../models/autoload.php';
require_once __DIR__ . './../models/class/user.class.php';

const ERROR_CONNECT = "Vos identifiants ou mots de passes sont incorrects";
const ERROR_EMPTY = "Veuillez rentrez vos informations";
const ERROR_PATTERN = "Caractères invalides";


function getViewLogin()
{
    require_once __DIR__ . './../view/loginView.php';
}

function storeInSession($user)
{
    $_SESSION['user'] = $user;
    header('location: ./');
}


function getLoginErrors($input)
{
    $patternLetterNumbers = '/^[a-zA-Z0-9]+$/';
    $patternPassword = '/^(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';


    $errors = [];

    $pseudo = $input['pseudo'];
    $password = $input["password"];

    if (empty($pseudo)) {
        $errors[] = ERROR_EMPTY;
    } else if (!preg_match($patternLetterNumbers, $pseudo)) {
        $errors[] = ERROR_PATTERN;
    }

    if (empty($password)) {
        $errors[] = ERROR_EMPTY;
    } else if (!preg_match($patternPassword, $password)) {
        $errors[] = ERROR_PATTERN;
    }
    $user = new User();
    $userInfo = $user->getUser($pseudo);
    if (!$userInfo) {

        $errors[] = ERROR_CONNECT;
    } else if (!password_verify($password, $userInfo['password'])) {
        $errors[] = ERROR_CONNECT;
    }
    return $errors;
}
