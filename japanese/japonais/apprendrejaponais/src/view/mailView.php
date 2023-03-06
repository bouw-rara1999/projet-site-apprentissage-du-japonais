<?php



$user = new User();

ob_start();
?>

<script src="./public/scripts/index.js" defer></script>
<link rel="stylesheet" href="./public/css/mailView.css" />
<div id="formConnect">
    <form method="post" action="" id="mailmodif-form">
        <label for="currentmail">Current mail:</label>
        <input type="text" id="currentmail" name="currentmail" placeholder="Current mail..." style="padding-left: 5px;" required><br><br>
        <label for="newpseudo">New mail:</label>
        <input type="text" id="newmail" name="newmail" placeholder="New mail..." style="padding-left: 5px;" required><br><br>
<?php require_once __DIR__ . '/../templates/modal.php'; ?>
<?php
$content = ob_get_clean();



require_once __DIR__ . '/../templates/mainTemp.php';

?>

