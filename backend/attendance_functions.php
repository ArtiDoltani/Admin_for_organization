<?php
include 'dbconnection.php';
// Function to Check employee logged in or not
function employee_sigin_exists($emp_id)
{
    include 'dbconnection.php';
    date_default_timezone_set('Asia/Karachi');
    $date = date('Y-m-d');
    $sql = "SELECT * FROM `attendance` WHERE emp_id='$emp_id' and `date`='$date'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

// Checking Employee Exits or not in Employee table
// Function to Check employee exists or not
function check_employee_exists($emp_id)
{
    include 'dbconnection.php';
    $sql = "SELECT * FROM `employees` WHERE id= '$emp_id'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}


// Function to insert Login Time
function employee_sigin_time($emp_id)
{
    include 'dbconnection.php';
    date_default_timezone_set('Asia/Karachi');
    $login_time = date('H:i:s');
    $sql_insert = "INSERT INTO `attendance`(`emp_id`, `login_time`, `status`) VALUES
    ('$emp_id','$login_time','present')";
    if ($conn->query($sql_insert)) {
        return true;
    } else {
        return false;
    }
}
