<?php 
session_start();
session_unset();
session_destroy();
header('location:../organization/all_login.html');
exit;
?>