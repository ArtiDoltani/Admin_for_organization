<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:user_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <link rel="icon" href="favicon.ico" type="image/x-icon" />

  <title>User :: Login</title>

  <!-- Bootstrap Core and vandor -->
  <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" />

  <!-- Core css -->
  <link rel="stylesheet" href="../assets/css/style.min.css" />
</head>

<body class="font-muli theme-cyan gradient">
  <div class="auth option2">
    <div class="auth_left">
      <div class="card">
        <div class="card-body">
          <form action="../backend/emp_attendance.php" method="post">
            <div class="text-center">
              <a class="header-brand" href="index.html"><i class="fa fa-graduation-cap brand-logo"></i></a>
              <div class="card-title mt-3">Employee Attendance</div>
              <!-- <button type="button" class="btn btn-facebook"><i class="fa fa-facebook mr-2"></i>Facebook</button>
                        <button type="button" class="btn btn-google"><i class="fa fa-google mr-2"></i>Google</button>
                        <h6 class="mt-3 mb-3">Or</h6> -->
            </div>
                        <div class="form-group row">
                                        <label class="col-md-4 col-form-label">Select Employee<span class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <select class="form-control show-tick" name="emp_id">
                                            <option>Select</option>
                                             <?php 
                                                include '../backend/dbconnection.php';
                                                $sql="SELECT `id`, concat(`f_name`,' ',`l_name`) as name FROM `employees`";
                                                $res=mysqli_query($conn,$sql);
                                                if(mysqli_num_rows($res)){
                                                    while($row=mysqli_fetch_assoc($res)){
                                                        ?>
                                                         <option value="<?php echo $row['id'] ;?>">
                                                            <?php echo $row['name']; ?></option>
                                               <?php
                                                    }
                                                }
                                                                                           
                                                ?>                                               
                                            </select>

                                               
              </div>
              </div>
              </div>
        <div class="text-center my-4">
          <button type="submit" class="btn btn-primary" value="signin_time" name="submit">Login Time</button>
          <button type="submit" class="btn btn-primary" value="signout_time" name="submit">Logout Time</button>
          <button type="submit" class="btn btn-danger" value="mark_absent" name="submit">Mark Absent</button>


          <!-- <a href="index.html" class="btn btn-primary btn-block" title=""
                  >Sign in</a>-->
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