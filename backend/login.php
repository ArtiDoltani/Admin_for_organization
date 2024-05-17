<?php
require 'dbconnection.php';
$login=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];
      $query_select="SELECT * FROM `admin` where `email`='$email' AND `password`='$password'";
        $result_select=mysqli_query($conn,$query_select);
        $num=mysqli_num_rows($result_select);
        if($num==1){
            // $login=true;
           session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['Email']=$email;
         echo"<script>alert('loggedin');
         window.location.href='../organization/index.php';
         </script>";
        }
        else{
            echo"<script>alert('Invalid! Username or Password ');
            window.location.href='../organization/login.html';
             </script>";
        }

}
?>
