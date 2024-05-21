<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="favicon.ico" type="image/x-icon"/>

<title>Forgot Password</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" />

<!-- Core css -->
<link rel="stylesheet" href="../assets/css/style.min.css"/>
<link rel="stylesheet" href="assets/css/default.css" />

</head>
<body class="font-muli theme-cyan gradient">

<?php 
    require "../backend/dbconnection.php";
    if(isset($_GET['email'])&& isset($_GET['resettoken']) ){
        date_default_timezone_set('Asia/karachi');
        $date=date("Y-m-d");
        $query= "SELECT* from `admin` WHERE `email` ='$_GET[email]' and 
         `resettoken`='$_GET[resettoken]' and `token_expire`='$date'";
        $result= mysqli_query($conn, $query);
        if($result){
            if(mysqli_num_rows($result)>0){

            echo "<div class='container my-4' >
            <h2>Reset Password</h2>
    
            <form method='post'>
          
    
      <div class='form-group'>
        <label for='password' name='password'>Password</label>
        <input type='password' class='form-control' placeholder='New Password' id='password' name='password'>
      </div>
      <div>
        <button type='submit' name='new_password' class='btn btn-primary'>Update</button>
        <input type='hidden' class='form-control' name='email' value='$_GET[email]' >
      </div>
                   
              </form>
          </div>"; }
            else{
                echo"
                <script>
                
                alert('invalid or Link is Expired');
                window.location.href='../organization/login.html';
                
                </script>";
            }
        }
        else{
            echo"
                <script>
                
                alert('Server is Down');
                window.location.href='../organization/login.html';
                
                </script>";

        }

    }
    else{

        " <script>
                
        alert('Server is Down');
        window.location.href='login.php';
        
        </script>";
    }  
    ?>

    <?php 
    if(isset($_POST['new_password'])){
      $pass=$_POST['password'];
      $query_update="UPDATE `admin` SET `password`='$pass',`resettoken`=Null,`token_expire`=Null
      WHERE `email`='$_POST[email]'";
      if(mysqli_query($conn,$query_update)){
        echo"
        
                <script>
                
                alert('Password Updated Successfully');
                window.location.href='../organization/login.html';
                </script>";
      }
      else{
        echo"
                <script>
                
                alert('Server is Down');
                window.location.href='../organization/login.html';
                
                </script>";

      }
    }
    
    ?>
   

<!-- Start Main project js, jQuery, Bootstrap -->
<script src="../assets/bundles/lib.vendor.bundle.js"></script>

<!-- Start project main js  and page js -->
<script src="../assets/js/core.js"></script>
</body>
</html>