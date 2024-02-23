<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    session_unset();
    unset($_SESSION);
    session_destroy();
    //session_write_close();
    exit(header("Location: index.php?page=login"));
    //include 'index.php';
?>