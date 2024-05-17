<?php 
$password="";
$username="root";
$serverName="localhost";
$database="admin_for_organization";
$conn=mysqli_connect($serverName,$username,$password,$database);
if(!$conn){
    echo"Sorry! Server is Down";
}



?>