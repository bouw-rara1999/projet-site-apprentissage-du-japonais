<?php 
$title = 'Déconnexion';
$zone_flot = "";
$form = '';
?>

<?php  
    
    
        ob_start(); ?>
        <div class="box-log">
        <li><a href="./?action=login" class="button">Se connecter</a></li>
        <li><a href="./?action=register" class="button">S'inscrire</a></li>
        </div>
        <?php $nav = ob_get_clean();
    
?>

<?php ob_start();?>

<div id="disconnect">
    <p class="text-dc">Vous avez bien été déconnecté</p>
    <p class="text-dc">Merci de votre visite</p>
    <p class="text-dc">À bientôt !</p>
  
  </div>

<?php $content = ob_get_clean();
require_once __DIR__ . './../templates/mainTemp.php'; ?>