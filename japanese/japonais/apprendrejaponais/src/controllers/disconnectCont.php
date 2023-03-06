<?php


function getViewDisconnect()
{
    unset($_SESSION);
    session_destroy();
    require_once __DIR__ . './../view/disconnectView.php';
}
