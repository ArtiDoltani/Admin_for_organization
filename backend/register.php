<?php
require 'dbconnection.php';
$showalert = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $select_query = "SELECT*  FROM `admin` WHERE `email`='$email'";
    $result = mysqli_query($conn, $select_query);
    if ($result->num_rows > 0) {
        $showalert = true;
        echo "<script>
alert('Invalid! User Already Exists.');
window.location.href='../organization/register.html';
</script>
";
    } else {
        $insert = "INSERT INTO `admin`(`name`, `email`, `password`) VALUES ('$name','$email','$pass')";
        $result = mysqli_query($conn, $insert);
        if ($result) {
            echo "<script>
alert('Success! Created New Account.');
window.location.href='../organization/login.html';
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
