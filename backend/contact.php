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



 <!-- Update contact -->
<?php
 function get_contact_by_id($contact_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM contacts WHERE contact_id = ?");
    $stmt->bind_param("i", $contact_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
?>

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

    // To Update check contact
    if (isset($_POST['contact_id'])) {
        $contact_id = $_POST['contact_id'];
        $contact = get_contact_by_id($contact_id); // Create this function to fetch a single contact by ID
    }

    // Update Contact
    if (isset($_GET['edit_id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $contact_id = $_GET['edit_id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $sql="UPDATE contacts SET `name` = '$name', `phone` = '$phone', `email` = '$email', `address` = '$address' WHERE contact_id = '$contact_id'";
        if($conn->query($sql)){

            echo "<script>
            alert('Contact updated Successfully');
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



    ?>