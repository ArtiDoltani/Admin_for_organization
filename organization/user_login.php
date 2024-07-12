
<?php 
 require '../backend/dbconnection.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_POST['email'];
    $password=$_POST['password'];
      $query_select="SELECT * FROM `attendance_user` where `email`='$email' AND `password`='$password'";
        $result_select=mysqli_query($conn,$query_select);
        $num=mysqli_num_rows($result_select);
        if($num==1){
            
           session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['Email']=$email;
         echo"<script>alert('loggedin');
         window.location.href='user_login_for_attend.php';
         </script>";
        }
        else{
            echo"<script>alert('Invalid! Username or Password ');
            window.location.href='staff_login.php';
             </script>";
        }

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <title>User:: Login</title>

    <!-- Bootstrap Core and vandor -->
    <link
      rel="stylesheet"
      href="../assets/plugins/bootstrap/css/bootstrap.min.css"
    />

    <!-- Core css -->
    <link rel="stylesheet" href="../assets/css/style.min.css" />
  </head>
  <body class="font-muli theme-cyan gradient">
    <div class="auth option2">
      <div class="auth_left">
        <div class="card">
          <div class="card-body">
            <form method="post">
              <div class="text-center">
                 <img class="header-brand" src="logo.png" alt="" width="90px">
                <div class="card-title mt-3">User Login</div>
                <!-- <button type="button" class="btn btn-facebook"><i class="fa fa-facebook mr-2"></i>Facebook</button>
                        <button type="button" class="btn btn-google"><i class="fa fa-google mr-2"></i>Google</button>
                        <h6 class="mt-3 mb-3">Or</h6> -->
              </div>
              <div class="form-group">
                <input
                  type="email"
                  class="form-control"
                  id="exampleInputEmail1"
                  aria-describedby="emailHelp"
                  placeholder="Enter email" name="email"
                />
              </div>
              <div class="form-group">
                <input
                  type="password"
                  class="form-control"
                  id="exampleInputPassword1"
                  placeholder="Password" name="password"
                />
              </div>
                <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                 <a href="all_login.html" class="btn btn-outline-secondary btn-block ">Go Back</a>
             </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Start Main project js, jQuery, Bootstrap -->
    <script src="../assets/bundles/lib.vendor.bundle.js"></script>

    <!-- Start project main js  and page js -->
    <script src="../assets/js/core.js"></script>
  </body>
</html>
