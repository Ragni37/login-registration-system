<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header('location:login.php');
} else {
    session_unset();
    session_destroy();
    header('location:login.php');
}
?>