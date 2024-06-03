<?php
function add_dept($dept_id, $stack)
{
    include 'dbconnection.php';
    $sql = "INSERT INTO `department`(`dept_id`, `stack_name`) VALUES 
('$dept_id','$stack')";
    if ($conn->query($sql)) {
        return true;
    } else {
        return false;
    }
}
?>

<!-- Show Dept -->
<?php
function show_dept()
{
    require 'dbconnection.php';
    $sql = "SELECT * FROM department";
    $result = $conn->query($sql);
    $depts = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $depts[] = $row;
        }
    }
    $conn->close();
    return $depts;
}

?>

<!-- Delete Dept -->
<?php
function delete_dept($del_id)
{
    require 'dbconnection.php';
    $sql = "DELETE FROM `department` WHERE dept_id='$del_id'";
    $result = $conn->query($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}
?>
        <!-- Update Department -->
<?php 
 function update_dept($edit_id,$dept_id,$stack){
    include 'dbconnection.php';
    $sql="UPDATE `department` SET `dept_id`='$dept_id',`stack_name`='$stack' WHERE `dept_id`='$edit_id'";
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
// <!-- Submit data -->
include 'dbconnection.php';
if (isset($_POST['add_dept'])) {
    $dept_id = $_POST['dept_id'];
    $stack = $_POST['stack'];
    if (add_dept($dept_id, $stack)) {
        echo "<script>alert('New Department added');
        window.location.href='../organization/departments.php';
        </script>";
    } else {
        echo "<script>alert('Sorry! Server down');
        window.location.href='../organization/departments.php';
        </script>";
    }
}

// Deleting dept

if (isset($_GET['del_id'])) {
    $del_id = $_GET['del_id'];
    if (delete_dept($del_id)) {

        echo "<script>alert('Deleted Successfully');
        window.location.href='../organization/departments.php';
        </script>";
    } else {
        echo "<script>alert('Sorry! Server down');
        window.location.href='../organization/departments.php';
        </script>";
    }
}

// check to Edit department
if(isset($_GET['edit_id'])){
    $edit_id=$_GET['edit_id'];
    $sql="SELECT * FROM department where dept_id='$edit_id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        $dept=mysqli_fetch_assoc($result);
    }

}
//   Update department
if (isset($_POST['edit_dept'])) {
    $edit_id=$_GET['edit_id'];
    $dept_id=$_POST['dept_id'];
    $stack = $_POST['stack'];
    if(update_dept($edit_id,$dept_id,$stack)){
        echo "<script>alert('Department updated');
        window.location.href='../organization/departments.php';
        </script>";
    } else {
        echo "<script>alert('Sorry! Server down');
        window.location.href='../organization/departments.php';
        </script>";
    }
    
      
}




?>