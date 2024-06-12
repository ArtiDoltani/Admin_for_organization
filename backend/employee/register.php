<?php
require '../dbconnection.php';
$showalert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $select_query = "SELECT*  FROM `employees` WHERE `email`='$email'";
    $result = mysqli_query($conn, $select_query);
    if ($result->num_rows > 0) {
        echo "<script>
alert('Invalid! User Already Exists.');
window.location.href='../../employee-dashboard/register.html';
</script>
";
    } else {
        $insert = "INSERT INTO `employees`(`f_name`,`l_name`, `email`, `password`) 
        VALUES ('$f_name','$l_name','$email','$pass')";
        $result = mysqli_query($conn, $insert);
        if ($result) {
            echo "<script>
alert('Success! Created New Account.');
window.location.href='../../employee-dashboard/employee_login.html';
</script>
";
        } else {
            echo "<script>
alert(Sorry! Server is down.);
window.location.href='/organization/register.html';
</script>
";
        }
    }
}
