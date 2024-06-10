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
<!-- Delete Function -->
<?php
function delete_payment($del_id)
{
    include 'dbconnection.php';

    $sql = "DELETE FROM `payments` WHERE payment_id='$del_id'";
    if ($conn->query($sql)) {
        return true;
    } else {
        return false;
    }
}
?>

<?php
// update Data into payment table
function update_payment($edit_id, $emp_id, $date, $salary, $payment_method, $payment_status)
{
    include 'dbconnection.php';
    $sql = "UPDATE `payments` SET `emp_id`='$emp_id',`date`='$date',`salary`='$salary',
    `payment_method`='$payment_method',`payment_status`='$payment_status'
     WHERE `payment_id`='$edit_id'";
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
        if (create_payment($emp_id, $date, $salary, $payment_method, $payment_status)) {
            echo "<script>alert('Success! Salary Added');
            window.location.href='../organization/payments.php';
            </script>";
        } else {
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
// Check id to delete
if (isset($_GET['del_id'])) {
    $del_id = $_GET['del_id'];
    if (delete_payment($del_id)) {

        echo "<script>alert('Success! Payment Deleted');
        window.location.href='../organization/payments.php';
        </script>";
    } else {
        echo "<script>alert('Sorry! Server Down');
        window.location.href='../organization/payments.php';
        </script>";
    }
}

// Check id to update
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    $sql = "SELECT * FROM `payments` WHERE payment_id='$edit_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $payment = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['edit_salary'])) {
    $edit_id = $_GET['edit_id'];
    $emp_id = $_POST['emp_id'];
    $date = date('Y-m-d', strtotime($_POST['date']));
    $salary = $_POST['salary'];
    $payment_method = $_POST['payment_method'];
    $payment_status = $_POST['payment_status'];
    if (check_employee_exists($emp_id)) {
        if (update_payment($edit_id,$emp_id, $date, $salary, $payment_method, $payment_status)) {
            echo "<script>alert('Success! Salary Updated');
            window.location.href='../organization/payments.php';
            </script>";
        } else {
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