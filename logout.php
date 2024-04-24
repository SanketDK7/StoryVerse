<?php
session_start();
session_unset();
session_destroy();
header('location:index.php');
?>
// Path: data.json
{
    "username": "admin",
    "password": "admin"
}