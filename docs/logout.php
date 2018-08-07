<?php
    session_start();
    require '../database/database.php';
    session_destroy();
    header('location:../');
?>