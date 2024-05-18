 <!-- Add Employee -->
 <?php
    function create_employee($folder, $email, $f_name, $l_name, $position, $stack, $phone)
    {
        require 'dbconnection.php';
        $sql = "INSERT INTO `employees`(`emp_image`,`f_name`, `l_name`, `stack`, `position`, `phone`, `email`) VALUES 
    ('$folder','$f_name','$l_name','$stack','$position','$phone','$email')";
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
        return $employees;
    }    ?>



 <!-- Update Employee -->

 <?php
    function update_employee($edit_id, $folder, $email, $f_name, $l_name, $position, $stack, $phone)
    {
        require 'dbconnection.php';
        $sql = "UPDATE `employees` SET `emp_image`='$folder',`f_name`='$f_name',`l_name`='$l_name',`stack`='$stack',`position`='$position',`phone`='$phone',`email`='$email' WHERE `id`='$edit_id'";

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
    function delete_employee($edit_id)
    {
        include 'dbconnection.php';
        $sql = "DELETE FROM employees WHERE id=$edit_id";
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // To Insert 
        if (isset($_POST['add'])) {
            $file_name = $_FILES['uploadfile']['name'];
            $temp_name = $_FILES['uploadfile']['tmp_name'];
            $folder = "../employee_images/" . $file_name;
            move_uploaded_file($temp_name, $folder);
            $email =  $_POST['email'];
            $f_name =  $_POST['f_name'];
            $l_name =  $_POST['l_name'];
            $stack =  $_POST['stack'];
            $position =  $_POST['position'];
            $phone =  $_POST['phone'];
            if (create_employee($folder, $email, $f_name, $l_name, $position, $stack, $phone)) {
                echo "<script>
        alert('Employee Added Successfully');
        window.location.href='../organization/employees.php';
        </script>
        ";
            } else {
                echo "<script>
        alert('Sorry!Server is Down');
        window.location.href='../organization/employees.php';
        </script>
        ";
            }
        }
        // Updating Employee Data
        if (isset($_POST['edit'])) {
            $edit_id = $_GET['edit_id'];
            $file_name = $_FILES['uploadfile']['name'];
            $temp_name = $_FILES['uploadfile']['tmp_name'];
            $folder = "../employee_images/" . $file_name;
            move_uploaded_file($temp_name, $folder);
            $email =  $_POST['email'];
            $f_name =  $_POST['f_name'];
            $l_name =  $_POST['l_name'];
            $stack =  $_POST['stack'];
            $position =  $_POST['position'];
            $phone =  $_POST['phone'];
            if (update_employee($edit_id, $folder, $email, $f_name, $l_name, $position, $stack, $phone)) {
                echo "<script>
        alert('Employee Updated Successfully');
        window.location.href='../organization/employees.php';
        </script>
        ";
            } else {
                echo "<script>
        alert('Sorry!Server is Down');
        window.location.href='../organization/employees.php';
        </script>
        ";
            }
        }
    }
    // To Delete

    if (isset($_GET['id'])) {
        $edit_id = $_GET['id'];
        if (delete_employee($edit_id)) {
            echo "<script>
        alert('Employee deleted successfully!');
        window.location.href='../organization/employees.php';
        </script>
        ";
        } else {
            echo "<script>
        alert('Sorry!Server is Down');
        window.location.href='../organization/employees.php';
        </script>
        ";
        }
    }

    // To Update check Employee

    if (isset($_GET['edit_id'])) {
        $edit_id = $_GET['edit_id'];
        $query = "SELECT * FROM employees where `id` = '$edit_id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $employee = mysqli_fetch_assoc($result);
        }
    }




    ?>