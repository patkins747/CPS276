<?php
session_start();

/* DELETES THE COOKIE BY SETTING BACK ONE HOUR */
setcookie("PHPSESSID", "", time() - 3600, "/");

/* DELETE THE SESSION VALUES*/

session_unset();           // Free all session variables
//session_destroy();         // Destroys data on server


/* REDIRECT TO THE INDEX.PHP PAGE*/ 
header('Location: index.php');
