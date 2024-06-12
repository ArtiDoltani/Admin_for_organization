<?php
require '../dbconnection.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];
      $query_select="SELECT * FROM `employees` where `email`='$email' AND `password`='$password'";
        $result_select=mysqli_query($conn,$query_select);
        $num=mysqli_num_rows($result_select);
        if($num==1){
            // $login=true;
           session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['email']=$email;
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
