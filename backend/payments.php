<?php
// Insert Data into payment table
function create_payment($emp_id, $date, $salary, $payment_method, $payment_status)
{
    include 'dbconnection.php';
    $sql = "INSERT INTO `payments`(`emp_id`, `date`, `salary`, `payment_method`, `payment_status`) VALUES 
    ('$emp_id','$date','$salary','$payment_method','$payment_status')";
    if ($conn->query($sql)) {
        return true;
    } else {
        return false;
    }
}
?>

<!-- Post Data -->
<?php
include 'attendance_functions.php';
include 'dbconnection.php';
if (isset($_POST['submit_salary'])) {
    $emp_id = $_POST['emp_id'];
    $date = date('Y-m-d', strtotime($_POST['date']));
    $salary = $_POST['salary'];
    $payment_method = $_POST['payment_method'];
    $payment_status = $_POST['payment_status'];
    if (check_employee_exists($emp_id)) {
        if(create_payment($emp_id, $date, $salary, $payment_method, $payment_status)){
            echo "<script>alert('Success! Salary Added');
            window.location.href='../organization/payments.php';
            </script>";
        }
        else{
            echo "<script>alert('Sorry! Server Down');
            window.location.href='../organization/payments.php';
            </script>";
        }

    } else {
        echo "<script>alert('Invalid! Employee does not exists.');
        window.location.href='../organization/payments.php';
        </script>";
    }
}
?>