<?php

include 'db.php';

session_start();

function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

function requireLogin()
{
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}

function isSuperAdmin()
{
    return $_SESSION['user_role'] === 'superadmin';
}

function logout()
{
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}

?>