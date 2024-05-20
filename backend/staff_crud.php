 <!-- Add staff -->
 <?php
    function create_staff($folder, $email, $f_name, $l_name, $designation,$phone)
    {
        require 'dbconnection.php';
        $sql = "INSERT INTO `staff`(`staff_image`,`f_name`, `l_name`, `designation`, `phone`, `email`) VALUES 
    ('$folder','$f_name','$l_name','$designation','$phone','$email')";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
        $conn->close();
    }
    ?>
 <!-- Read staff -->

 <?php
    function get_staffs()
    {
        require 'dbconnection.php';
        $sql = "SELECT * FROM staff";
        $result = $conn->query($sql);
        $staffs = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $staffs[] = $row;
            }
        }
        $conn->close();
        return $staffs;
    }    ?>



 <!-- Update staff -->

 <?php
    function update_staff($edit_id, $folder, $email, $f_name, $l_name, $designation, $phone)
    {
        require 'dbconnection.php';
        $sql = "UPDATE `staff` SET `staff_image`='$folder',`f_name`='$f_name',`l_name`='$l_name',`designation`='$designation',`phone`='$phone',`email`='$email'
         WHERE `id`='$edit_id'";

        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
        $conn->close();
    }
    ?>

 <!-- Delete staff -->
 <?php
    function delete_staff($edit_id)
    {
        include 'dbconnection.php';
        $sql = "DELETE FROM staff WHERE id=$edit_id";
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
            $folder = "../staff_images/" . $file_name;
            move_uploaded_file($temp_name, $folder);
            $email =  $_POST['email'];
            $f_name =  $_POST['f_name'];
            $l_name =  $_POST['l_name'];
            $designation =  $_POST['designation'];
            $phone =  $_POST['phone'];
            $joining_date =  $_POST['joining_date'];
            if (create_staff($folder, $email, $f_name, $l_name, $designation, $phone,$joining_date)) {
                echo "<script>
        alert('staff Added Successfully');
        window.location.href='../organization/staff.php';
        </script>
        ";
            } else {
                echo "<script>
        alert('Sorry!Server is Down');
        window.location.href='../organization/staff.php';
        </script>
        ";
            }
        }
        // Updating staff Data
        if (isset($_POST['edit'])) {
            $edit_id = $_GET['edit_id'];
            $file_name = $_FILES['uploadfile']['name'];
            $temp_name = $_FILES['uploadfile']['tmp_name'];
            $folder = "../staff_images/" . $file_name;
            move_uploaded_file($temp_name, $folder);
            $email =  $_POST['email'];
            $f_name =  $_POST['f_name'];
            $l_name =  $_POST['l_name'];
            $designation =  $_POST['designation'];
            $phone =  $_POST['phone'];
          //  $joining_date =  $_POST['joining_date'];
           
            if (update_staff($edit_id, $folder, $email, $f_name, $l_name, 
            $designation, $phone)) {
                echo "
                <script>
        alert('staff Updated Successfully');
        window.location.href='../organization/staff.php';
        </script>
        ";
            } else {
                echo "
              down
        ";
            }
        }
    }
    // To Delete

    if (isset($_GET['id'])) {
        $edit_id = $_GET['id'];
        if (delete_staff($edit_id)) {
            echo "<script>
        alert('staff deleted successfully!');
        window.location.href='../organization/staff.php';
        </script>
        ";
        } else {
            echo "<script>
        alert('Sorry!Server is Down');
        window.location.href='../organization/staff.php';
        </script>
        ";
        }
    }

    // To Update check staff

    if (isset($_GET['edit_id'])) {
        $edit_id = $_GET['edit_id'];
        $query = "SELECT * FROM staff where `id` = '$edit_id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $staff = mysqli_fetch_assoc($result);
        }
    }




    ?>