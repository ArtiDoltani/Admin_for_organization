 <!-- Add Employee -->
 <?php
    function create_employee($email, $f_name, $l_name, $position, $stack, $phone)
    {
        require 'dbconnection.php';
        $sql = "INSERT INTO `employees`(`f_name`, `l_name`, `stack`, `position`, `phone`, `email`) VALUES 
    ('$f_name','$l_name','$stack','$position','$phone','$email')";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
        $conn->close();
    }
    ?>
                        <!-- Read Employee -->

 <?php
    function get_employees()
    {
        require 'dbconnection.php';
        $sql = "SELECT * FROM employees";
        $result = $conn->query($sql);
        $employees = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $employees[] = $row;
            }
        }
        $conn->close();
        return $employees;}    ?>
     
    
    
     <!-- Update Employee -->
 
 <?php
    function update_employee($id, $email, $f_name, $l_name, $position, $stack, $phone)
    {
        require 'dbconnection.php';
        $sql = "UPDATE employees SET f_name='$f_name', email='$email', position='$position', l_name='$l_name'
    stack='$stack', phone='$phone' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
        $conn->close();
    }
    ?>

                        <!-- Delete Employee -->
 <?php
function delete_employee($id) {
   include 'dbconnection.php';
    $sql = "DELETE FROM employees WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
    $conn->close();
}
?>

<?php 
   include 'dbconnection.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    // To Insert 
    if(isset($_POST['add'])){
        $email=  $_POST['email'];
        $f_name=  $_POST['f_name'];
        $l_name=  $_POST['l_name'];
        $stack=  $_POST['stack'];
        $position=  $_POST['position'];
        $phone=  $_POST['phone'];
        if(create_employee($email, $f_name, $l_name, $position, $stack, $phone)){
            echo "<script>
        alert('Employee Added Successfully');
        window.location.href='../organization/employees.php';
        </script>
        ";
    }
    else{
        echo "<script>
        alert('Sorry!Server is Down');
        window.location.href='../organization/employees.php';
        </script>
        ";
   }
    }

                         // To Delete
   }

   if(isset($_GET['id'])){
    $id=$_GET['id'];
    if(delete_employee($id)){
        echo "<script>
        alert('Employee deleted successfully!');
        window.location.href='../organization/employees.php';
        </script>
        ";
    }
    else{
         echo "<script>
        alert('Sorry!Server is Down');
        window.location.href='../organization/employees.php';
        </script>
        ";
    }
}
?>