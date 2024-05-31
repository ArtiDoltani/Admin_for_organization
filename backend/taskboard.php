<?php 
function add_task($task_title,$description,$start_date,$end_date,$status){
include 'dbconnection.php';
$sql ="INSERT INTO `taskboard`(`title`, `description`, `start_date`, `end_date`, `status`) VALUES 
('$task_title','$description','$start_date','$end_date','$status')";
if($conn->query($sql)){
    return true;
}
else {
    return false;
}
}
?>

<!-- Show Task -->
<?php 
function show_tasks()
    {
        require 'dbconnection.php';
        $sql = "SELECT * FROM taskboard";
        $result = $conn->query($sql);
        $tasks = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tasks[] = $row;
            }
        }
        $conn->close();
        return $tasks;
    } 

?>
                 <!-- Planned Tasks -->
<?php
                 function planned_tasks()
    {
        require 'dbconnection.php';
        $sql = "SELECT * FROM taskboard where `status`='Planned'";
        $result = $conn->query($sql);
        $planned_task = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $planned_task[] = $row;
            }
        }
        $conn->close();
        return $planned_task;
    } 

?>
    <!-- In progress Tasks -->
    <?php
                 function in_prograss_tasks()
    {
        require 'dbconnection.php';
        $sql = "SELECT * FROM taskboard where `status`='In progress'";
        $result = $conn->query($sql);
        $in_progress_task = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $in_progress_task[] = $row;
            }
        }
        $conn->close();
        return $in_progress_task;
    } 

?>
    <!-- Completed Tasks -->
    <?php
                 function completed_tasks()
    {
        require 'dbconnection.php';
        $sql = "SELECT * FROM taskboard where `status`='Completed'";
        $result = $conn->query($sql);
        $completed_task = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $completed_task[] = $row;
            }
        }
        $conn->close();
        return $completed_task;
    } 

?>




<?php 
include 'dbconnection.php';
if(isset($_POST['submit_task'])){
    $task_title=$_POST['task_title'];
    $description=$_POST['description'];
    $start_date=date('Y-m-d', strtotime($_POST['start_date']));
    $end_date=date('Y-m-d', strtotime($_POST['end_date']));
    $status=$_POST['status'];
    if(add_task($task_title,$description,$start_date,$end_date,$status)){
        echo "<script>alert('New Task added');
        window.location.href='../organization/taskboard.php';
        </script>";
    }
    else{
        echo "<script>alert('Sorry! Server down');
        window.location.href='../organization/taskboard.php';
        </script>";

    }
}

?>