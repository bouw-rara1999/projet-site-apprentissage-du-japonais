<?php session_start();

require_once __DIR__ . '/src/controllers/homePageCont.php';
require_once __DIR__ . '/src/models/class/user.class.php';

$user = new User();

// Vérifier si la variable GET existe et qu'elle contient une action à effectuer
if (!empty($_GET) && isset($_GET)) {
    
    // Rediriger vers la page de connexion si la variable GET 'action' est égale à 'login'
    if (!empty($_GET['action']) && $_GET['action'] === 'login') {
        require_once __DIR__ . '/src/controllers/loginCont.php';

        getViewLogin();     
    }
    
    // Rediriger vers la page d'inscription si la variable GET 'action' est égale à 'register'
    else if (!empty($_GET['action']) && $_GET['action'] === 'register') {
        require_once __DIR__ . '/src/controllers/registerCont.php';
        getViewRegister();
    }

    // Vérifier si la variable POST existe et qu'elle contient les informations nécessaires pour modifier le pseudo
    else if (!empty($_POST['currentpseudo']) && !empty($_POST['newpseudo'])) {
        echo $user->modifpseudo();
    } 
    
    // Rediriger vers la page de modification du pseudo si la variable GET 'action' est égale à 'modif'
    else if (!empty($_GET['action']) && $_GET['action'] === 'modif') {
        require_once __DIR__ . '/src/view/pseudoView.php';
    }

     // Rediriger vers la page d'accueil
     else if (!empty($_GET['action']) && $_GET['action'] === 'accueil') {
        require_once __DIR__ . '/src/view/accueilView.php';
    }
    
    
    // Vérifier si la variable POST existe et qu'elle contient les informations nécessaires pour modifier l'adresse email
    else if (!empty($_POST['currentmail']) && !empty($_POST['newmail'])) {
        echo $user->modifmail();
    }
    
    // Rediriger vers la page de modification de l'adresse email si la variable GET 'action' est égale à 'modifmail'
    else if (!empty($_GET['action']) && $_GET['action'] === 'modifmail') {
        require_once __DIR__ . '/src/view/mailView.php';
    }

    // Vérifier si la variable POST existe et qu'elle contient les informations nécessaires pour modifier le mot de passe
    else if (!empty($_POST['currentpassword']) && !empty($_POST['newpassword'])) {
        echo $user->modifpassword();
    } 
    
    // Rediriger vers la page de modification du mot de passe si la variable GET 'action' est égale à 'modifpassword'
    else if (!empty($_GET['action']) && $_GET['action'] === 'modifpassword') {
        require_once __DIR__ . '/src/view/passwordView.php';
    }

 else if (!empty($_GET['action'] === 'disconnect')){
    require_once __DIR__ . './src/controllers/disconnectCont.php';
    getViewDisconnect();
}
    
} else {
    // Si la variable GET ne contient aucune action, afficher la page d'accueil
    homepage();
}
