<?php 
function add_task($emp_id,$priority,$task_title,$description,$start_date,$end_date,$status,$assigned_by){
include 'dbconnection.php';
$sql ="INSERT INTO `taskboard`(`title`, `emp_id`, `priority`,`description`, `start_date`, `end_date`, `status`,`assigned_by`)
 VALUES ('$task_title','$emp_id','$priority','$description','$start_date','$end_date','$status','$assigned_by')";
if($conn->query($sql)){
    return true;
}
else {
    return false;
}
}
// update Task
// function update_task($emp_id,$id_edit,$task_title,$prio,$description,$start_date,$end_date,$status,$assigned_by){
//     include 'dbconnection.php';
//     $sql="UPDATE `taskboard` SET `emp_id`='$emp_id', `title`='$task_title',`priority`='$prio',`description`='$description',`start_date`='$start_date',
//       `end_date`='$end_date',`status`='$status',`assigned_by`='$assigned_by' WHERE `task_id`='$id_edit'";
//       if($conn->query($sql)){
//           return true;
//       }
//       else{
//           return false;
//       }
//   }
  
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
 <!-- Update task -->
 <?php
 function get_task_by_id($task_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM taskboard WHERE task_id = ?");
    $stmt->bind_param("i", $task_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
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
// Submit Task
if(isset($_POST['submit_task'])){
    $emp_id=$_POST['emp_id'];
    $task_title=$_POST['task_title'];
    $description=$_POST['description'];
    $start_date=date('Y-m-d', strtotime($_POST['start_date']));
    $end_date=date('Y-m-d', strtotime($_POST['end_date']));
    $status=$_POST['status'];
    $assigned_by=$_POST['assigned_by'];
    $priority=$_POST['priority'];
   
    if(add_task($emp_id,$priority,$task_title,$description,$start_date,$end_date,$status,$assigned_by)){
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
            // Delete Task
if(isset($_GET['del_id'])){
    $del_id=$_GET['del_id'];
    $sql="DELETE FROM `taskboard` WHERE task_id='$del_id'";
    if($conn->query($sql)){

        echo "<script>alert('Task deleted Successfully');
        window.location.href='../organization/taskboard.php';
        </script>";
    }
    else{
        echo "<script>alert('Sorry! Server down');
        window.location.href='../organization/taskboard.php';
        </script>";

    }
}

// Update Task
if (isset($_GET['edit_id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = $_GET['edit_id'];
    $status = $_POST['status'];
    $sql="UPDATE taskboard SET `status` = '$status' WHERE task_id = '$task_id'";
    if($conn->query($sql)){

        echo "<script>
        alert('task updated Successfully');
        window.location.href='../employee-dashboard/task.php';
        </script>
        ";
            } else {
                echo "<script>
        alert('Sorry!Server is Down');
        window.location.href='../employee-dashboard/task.php';
        </script>
        ";
            }
    
   
}

// checck to Update Task For admin
if(isset($_GET['id_edit'])){
    $id_edit=$_GET['id_edit'];
    $sql="SELECT* FROM taskboard where task_id='$id_edit'";
    $res=$conn->query($sql);
    if($res){
        $task=mysqli_fetch_assoc($res);
    }
}

     // update Task
    //  if(isset($_POST['edit_task'])){
    //     $emp_id=$_POST['emp_id'];
    //     $id_edit=$_GET['id_edit'];
    //     $task_title=$_POST['task_title'];
    //     $description=$_POST['description'];
    //     $start_date=date('Y-m-d', strtotime($_POST['start_date']));
    //     $end_date=date('Y-m-d', strtotime($_POST['end_date']));
    //     $status=$_POST['status'];
    //     $assigned_by=$_POST['assigned_by'];
    //     $prio=$_POST['priority'];
    //     echo $_POST['priority'];
    //     if(update_task($id_edit,$emp_id,$start_date,$end_date,$status,$prio,$description,$task_title,$assigned_by)){
    
    //         echo "<script>
    //         alert('task updated Successfully');
    //         </script>
    //         ";
    //             } else {
    //                 echo "<script>
    //         alert('Sorry!Server is Down');
    //         window.location.href='../organization/taskboard.php';
    //         </script>
    //         ";
    //             }
        
       
    
    // }
    // Update Task
function update_task($emp_id, $id_edit, $prior, $task_title, $description, $status, $assigned_by){
    global $conn;

    $sql = "UPDATE taskboard SET title='$task_title', emp_id='$emp_id', priority='$prior', `description`='$description',
       `status`='$status', assigned_by='$assigned_by' WHERE task_id='$id_edit'";

    
    if ($conn->query($sql)) {
        return true;
    } else {
            return false;
    }
}

if (isset($_POST['edit_task'])) {
 date_default_timezone_set('Asia/Karachi');
    $emp_id = $_POST['emp_id'];
    $id_edit = $_GET['id_edit'];
    $task_title = $_POST['task_title'];
    $description = $_POST['description'];
    // $start_date=date('Y-m-d', strtotime($_POST['start_date']));
    // $end_date=date('Y-m-d', strtotime($_POST['end_date']));
    $status = $_POST['status'];
    $assigned_by = $_POST['assigned_by'];
    $prio = $_POST['priority'];

    if (update_task($emp_id, $id_edit, $prio, $task_title, $description, $status, $assigned_by)) {
        echo "<script>
        alert('Task updated successfully');
        window.location.href='../organization/taskboard.php';
        </script>";
    } else {
        echo "<script>
        alert('Sorry! Server is down');
                </script>";
    }
}



?>