<?php
require 'dbconnection.php';
include 'attendance_functions.php';

// Code To submit data in database
if (isset($_POST['submit'])) {
    $clicked_button = $_POST['submit'];
    // This is for Signin time
    if ($clicked_button == 'signin_time') {
        $emp_id = $_POST['emp_id'];

        if (check_employee_exists($emp_id)) {

            if (employee_sigin_exists($emp_id)) {
                echo "<script>alert('Already Marked');
            window.location.href='../organization/user_login_for_attend.php';
            </script>";
            } else {
                if (employee_sigin_time($emp_id)) {

                    echo "<script>alert('Logged In');
                    window.location.href='../organization/user_login_for_attend.php';
                    </script>";
                } else {
                    echo "<script>alert('Sorry! Server down');
                    window.location.href='../organization/user_login_for_attend.php';
                    </script>";
                }
            }
        } else {
            echo "<script>alert('Invalid! Employee Does not Exists.');
                window.location.href='../organization/user_login_for_attend.php';
                </script>";
        }
    }
    // This is for Signout time
    elseif ($clicked_button == 'signout_time') {
        $emp_id = $_POST['emp_id'];
        date_default_timezone_set('Asia/Karachi');
        $date = date('Y-m-d');
        $logout_time = date('H:i:s');

        if (employee_sigin_exists($emp_id)) {
            $sql = "UPDATE `attendance` SET `logout_time`='$logout_time' WHERE
                    `emp_id`='$emp_id' and `date`='$date' and `status`='present'";
            if ($conn->query($sql)) {
                echo "<script>alert('Success! Logged Out.');
                        window.location.href='../organization/user_login_for_attend.php';
                        </script>";
            } else {
                echo "<script>alert('Invalid! Sever Down.');
                        window.location.href='../organization/user_login_for_attend.php';
                        </script>";
            }
        } else {
            echo "<script>alert('Invalid! Employee Does not Exists or not logged in.');
                        window.location.href='../organization/user_login_for_attend.php';
                        </script>";
        }
    }
    //    this is for Absent
    elseif ($clicked_button == 'mark_absent') {
        $emp_id = $_POST['emp_id'];

        if (check_employee_exists($emp_id)) {
            if (employee_sigin_exists($emp_id)) {
                echo "<script>alert('Employee Already Marked.');
            window.location.href='../organization/user_login_for_attend.php';
            </script>";
            } else {
                $sql_insert = "INSERT INTO `attendance`(`emp_id`, `status`) VALUES
                ('$emp_id','absent')";
                if ($conn->query($sql_insert)) {
                    echo "<script>alert('Marked Absent');
                    window.location.href='../organization/user_login_for_attend.php';
                    </script>";
                } else {
                    echo "<script>alert('Sorry!Server Down.');
                    window.location.href='../organization/user_login_for_attend.php';
                    </script>";
                }
            }
        } else {
            echo "<script>alert('Invalid! Employee Does not Exists.');
            window.location.href='../organization/user_login_for_attend.php';
            </script>";
        }
    }
}
