<?php
require '../dbconnection.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];
      $query_select="SELECT * FROM `employees` where `email`='$email' AND `password`='$password'";
        $result_select=mysqli_query($conn,$query_select);
        $num=mysqli_num_rows($result_select);
        if($num==1){
             session_start();
             $_SESSION['loggedin']=true;
             while($row=mysqli_fetch_assoc($result_select)){
              $_SESSION['emp_id']=$row['id'];
              $_SESSION['name']=$row['f_name'] . ' ' . $row['l_name'];
             }
            
         echo"<script>alert('You are loggedin');
         window.location.href='../../employee-dashboard/dashboard.php';
         </script>";
        }
        else{
            echo"<script>alert('Invalid! Username or Password ');
            window.location.href='../../employee-dashboard/employee_login.html';
             </script>";
        }

}
?>
