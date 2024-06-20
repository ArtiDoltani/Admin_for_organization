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
    $apr_id=$_GET['apr_id'];
    $sql="UPDATE `leaves` SET `status`='Approved' WHERE leave_id='$apr_id'";
    if($conn->query($sql)){

        echo "<script>
        alert('Leave  approved Successfully');
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


 