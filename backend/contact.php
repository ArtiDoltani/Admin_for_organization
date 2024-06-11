 <!-- Add Contact -->
 <?php
    function create_contact($email, $name, $address, $phone)
    {
        require 'dbconnection.php';
        $sql = "INSERT INTO `contacts`(`phone`, `address`, `email`,`name`)
         VALUES ('$phone','$address','$email','$name')";
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
        $conn->close();
    }
    ?>
 <!-- Read Contacts -->

 <?php
    function get_contacts()
    {
        require 'dbconnection.php';
        $sql = "SELECT * FROM `contacts`";
        $result = $conn->query($sql);
        $contacts = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $contacts[] = $row;
            }
        }
        $conn->close();
        return $contacts;
    }    ?>



 <!-- Update Employee -->

 
 <!-- Delete Contact -->
 <?php
    function delete_contact($del_id)
    {
        include 'dbconnection.php';
        $sql = "DELETE FROM contacts WHERE contact_id='$del_id'";
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
        if (isset($_POST['add_contact'])) {
            $email =  $_POST['email'];
            $name =  $_POST['name'];
            $address =  $_POST['address'];
            $phone =  $_POST['phone'];
            if (create_contact( $email, $name, $address, $phone)) {
                echo "<script>
        alert('Contact Added Successfully');
        window.location.href='../organization/app-contact.php';
        </script>
        ";
            } else {
                echo "<script>
        alert('Sorry!Server is Down');
        window.location.href='../organization/app-contact.php';
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
            // $stack =  $_POST['stack'];
            $position =  $_POST['position'];
            $phone =  $_POST['phone'];
            $dept_id=$_POST['dept_id'];
            if (update_employee($edit_id, $folder, $email, $f_name, $l_name, $position, $phone,$dept_id)) {
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

    if (isset($_GET['del_id'])) {
        $del_id = $_GET['del_id'];
        if (delete_contact($del_id)) {
            echo "<script>
        alert('Contact deleted successfully!');
        window.location.href='../organization/app-contact.php';
        </script>
        ";
        } else {
            echo "<script>
        alert('Sorry!Server is Down');
        window.location.href='../organization/app-contact.php';
        </script>
        ";
        }
    }

    // To Update check Employee

    if (isset($_GET['edit_id'])) {
        $edit_id = $_GET['edit_id'];
        $query = "SELECT * FROM contacts where `contact_id` = '$edit_id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $contact = mysqli_fetch_assoc($result);
        }
    }




    ?>