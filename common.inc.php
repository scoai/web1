<?php
    spl_autoload_register();

    error_reporting(0);

    ini_set('display_errors', false);

    session_start();

    $userinfo = isset($_SESSION["username"]) ? @unserialize($_SESSION["username"]) : null;
?>