<!-- Add Holiday -->
<?php
function add_holiday($title, $holiday_type, $start_date, $end_date)
{
    include 'dbconnection.php';
    $sql = "INSERT INTO `holiday`(`title`, `holiday_type`, `start_date`, `end_date`) VALUES 
('$title','$holiday_type','$start_date','$end_date')";
    if ($conn->query($sql)) {
        return true;
    } else {
        return false;
    }
}
?>
<!-- show_holidays -->
<?php
function show_holidays()
{
    require 'dbconnection.php';
    $sql = "SELECT * FROM holiday";
    $result = $conn->query($sql);
    $holidays = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $holidays[] = $row;
        }
    }
    $conn->close();
    return $holidays;
}

?>
<!-- Delete Holiday -->
<?php
function delete_holidays($del_id)
{
    require 'dbconnection.php';
    $sql = "DELETE FROM holiday WHERE holiday_id='$del_id'";
    $result = $conn->query($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

?>
<?php 
 function update_holiday($edit_id,$title, $holiday_type, $start_date, $end_date){
    include 'dbconnection.php';
    $sql="UPDATE `holiday` SET `title`='$title',`holiday_type`='$holiday_type',
    `start_date`='$start_date',`end_date`='$end_date' WHERE holiday_id='$edit_id'";
    if($conn->query($sql)){
        return true;
    }
    else{
        return false;
    }
    $conn->close();

 }


?>



<!-- Calling Functions -->
<?php
include 'dbconnection.php';
if (isset($_POST['submit_holiday'])) {
    $title = $_POST['title'];
    $holiday_type = $_POST['holiday_type'];
    $start_date = date('Y-m-d', strtotime($_POST['start_date']));
    $end_date = date('Y-m-d', strtotime($_POST['end_date']));
    if (add_holiday($title, $holiday_type, $start_date, $end_date)) {
        echo "<script>alert('New Holiday added');
        window.location.href='../organization/holiday.php';
        </script>";
    } else {
        echo "<script>alert('Sorry! Server down');
        window.location.href='../organization/holiday.php';
        </script>";
    }
}

// Deleting holiday

if(isset($_GET['del_id'])){
    $del_id=$_GET['del_id'];
    if(delete_holidays($del_id)){
        
        echo "<script>alert('Deleted Successfully');
        window.location.href='../organization/holiday.php';
        </script>";
    } else {
        echo "<script>alert('Sorry! Server down');
        window.location.href='../organization/holiday.php';
        </script>";
    }
}
// check to Edit Holiday
if(isset($_GET['edit_id'])){
    $edit_id=$_GET['edit_id'];
    $sql="SELECT * FROM holiday where holiday_id='$edit_id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $holiday=mysqli_fetch_assoc($result);
    }

}

if (isset($_POST['edit_holiday'])) {
    $edit_id=$_GET['edit_id'];
    $title = $_POST['title'];
    $holiday_type = $_POST['holiday_type'];
    $start_date = date('Y-m-d', strtotime($_POST['start_date']));
    $end_date = date('Y-m-d', strtotime($_POST['end_date']));
    if (update_holiday($edit_id,$title, $holiday_type, $start_date, $end_date)) {
        echo "<script>alert('Holiday updated');
        window.location.href='../organization/holiday.php';
        </script>";
    } else {
        echo "<script>alert('Sorry! Server down');
        window.location.href='../organization/holiday.php';
        </script>";
    }
}



?>