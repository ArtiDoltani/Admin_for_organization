<?php
session_start();
session_unset();
session_destroy();
header("location:employee_login.html");
exit;
?>