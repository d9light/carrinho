<?php
if ($_REQUEST) {
    echo 'sosos';
    @session_start();
    @session_destroy();
    @session_abort();
    header('location:../login.php?cod=172');
}