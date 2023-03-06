<?php $alert = '';
if (isset($_POST) && $_POST) {
    $input = filter_input_array(INPUT_POST, [
        'pseudo' => FILTER_SANITIZE_SPECIAL_CHARS,
        'password' => FILTER_SANITIZE_SPECIAL_CHARS,
    ]);
    $errors = getLoginErrors($input);
    if (!$errors) {
        $user = new User();
        $userInfo = $user->getUser($input['pseudo']);
        storeInSession($userInfo);
    } else {
        $alert = '<div class="alert alert-danger"><ul>';
        foreach ($errors as $error) {
            $alert .= '<li>' . $error . '</li>';
        }
        $alert .= '</ul></div>';
    }
}

ob_start();
?>

<link rel="stylesheet" href="./public/css/connexion.css" />

<div id="formConnect">
    <h1>Connexion</h1>
    <p class="para">Saisissez vos identifiants pour vous connecter</p>
    <form id="form" action="" method="post">
        <?= $alert ?>
        <p>Identifiant :</p>
        <input class="input" type="text" name="pseudo" placeholder="pseudo">
        <p>Mot de passe :</p>
        <input class="input" type="text" name="password" placeholder="mot">
        <p class="errors"><?= $errors['error'] ?? ''; ?></p>
        <input class="button" type="submit" value="Connexion">
    </form>
    <div>

        <?php
        $content = ob_get_clean();
        require_once __DIR__ . '/../templates/mainTemp.php';
