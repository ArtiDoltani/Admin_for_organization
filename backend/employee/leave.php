<!-- Add Leave -->
<?php
session_start();
require '../dbconnection.php';
    function add_leave($reason,$start_date,$end_date)
    {
        global $conn;
        $sql = "INSERT INTO `leaves`(`reason`, `emp_id`,`start`,`end`)
         VALUES ('$reason','$_SESSION[emp_id]','$start_date','$end_date')";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
        $conn->close();
    }
    
if(isset($_POST['submit_leave'])){
    $reason=$_POST['reason'];
    $start_date=  date('Y-m-d', strtotime($_POST['start_date']));
    $end_date=  date('Y-m-d', strtotime($_POST['end_date']));

if(add_leave($reason,$start_date,$end_date)){
    echo "<script>
    alert('Leave Added Successfully');
    window.location.href='../../employee-dashboard/dashboard.php';
    </script>
    ";
        } else {
            echo "<script>
    alert('Sorry!Server is Down');
    window.location.href='../../employee-dashboard/dashboard.php';
    </script>
    ";
        }

} 
// Leave Approve

if(isset($_GET['apr_id'])){
    $apr_id = $_GET['apr_id'];

    // Retrieving the employee ID and leave dates
    $leaveQuery = "SELECT emp_id, start, end FROM `leaves` WHERE leave_id='$apr_id'";
    $leaveResult = mysqli_query($conn, $leaveQuery);
    if($leaveRow = mysqli_fetch_assoc($leaveResult)) {
        $employee_id = $leaveRow['emp_id'];
        $start_date = $leaveRow['start'];
        $end_date = $leaveRow['end'];

        // Update leave status
        $sql = "UPDATE `leaves` SET `status`='Approved' WHERE leave_id='$apr_id'";
        if($conn->query($sql)) {
            // Insert attendance records for the leave dates
            $start = new DateTime($start_date);
            $end = new DateTime($end_date);
            $end->modify('+1 day'); // To include the end date in the period

            $period = new DatePeriod($start, new DateInterval('P1D'), $end);

            foreach ($period as $date) {
                $attendance_date = $date->format('Y-m-d');
                $insertAttendance = "INSERT INTO `attendance` (`emp_id`, `date`, `status`) VALUES ('$employee_id', '$attendance_date', 'leave')";
                $conn->query($insertAttendance);
            }

            echo "<script>
            alert('Leave approved successfully');
            window.location.href='../../organization/leave.php';
            </script>";
        } else {
            echo "<script>
            alert('Sorry!Server is Down');
            window.location.href='../../employee-dashboard/dashboard.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('Leave request not found');
        window.location.href='../../organization/leave.php';
        </script>";
    }
}



// Leave Reject
if(isset($_GET['rej_id'])){
    $rej_id=$_GET['rej_id'];
    $sql="UPDATE `leaves` SET `status`='Rejected' WHERE leave_id='$rej_id'";
    if($conn->query($sql)){

        echo "<script>
        alert('Leave  Rejected');
        window.location.href='../../organization/leave.php';
        </script>
        ";
            } else {
                echo "<script>
        alert('Sorry!Server is Down');
        window.location.href='../../employee-dashboard/dashboard.php';
        </script>
        ";
            }
    
}


    ?>


 