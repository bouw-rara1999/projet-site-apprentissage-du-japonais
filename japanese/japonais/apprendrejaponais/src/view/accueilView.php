<?php ob_start();?>
    <p>funny way to increase your<br>speaking skills in Japanese</p>
    <figure>
       <img src="./public/image/uploads/montfuji-unsplash.jpg" alt="Montagne japonaise Mont fuji">
    </figure>
    <p id="pg2">imitate the way of speaking<br>of real Japanese from daily life</p>
    

    <?php $content = ob_get_clean();
     require_once __DIR__ . '/../templates/mainTemp.php';?>
