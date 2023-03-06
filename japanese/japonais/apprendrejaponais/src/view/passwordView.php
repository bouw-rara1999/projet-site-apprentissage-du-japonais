<?php

// require_once __DIR__ . './../controllers/loginCont.php';
$user = new User();

ob_start();
?>
<script src="./public/scripts/index.js" defer></script>
<link rel="stylesheet" href="./public/css/modifpassword.css" />
<div id="formConnect">
    <form method="post" action="" id="mailmodif-form">
        <label for="currentpassword">Current password:</label>
        <input type="text" id="currentpassword" name="currentpassword" placeholder="Current password..." style="padding-left: 5px;" required><br><br>
        <label for="newpassword">New password:</label>
        <input type="text" id="newpassword" name="newpassword" placeholder="New password..." style="padding-left: 5px;"  required><br><br>
<?php require_once __DIR__ . '/../templates/modal.php'; ?></div>
        
        
<?php
$content = ob_get_clean();

require_once __DIR__ . '/../templates/mainTemp.php';
