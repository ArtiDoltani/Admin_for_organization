<?php 
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:employee_login.html");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee:: Dashboard</title>
    <!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" />

<!-- Plugins css -->
<link rel="stylesheet" href="../assets/plugins/summernote/dist/summernote.css"/>


<!-- Core css -->
<link rel="stylesheet" href="../assets/css/style.min.css"/>

</head>
<body class="font-muli theme-cyan gradient">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>
<div id="main_content">
    <!-- Start Main top header -->
    <div id="header_top" class="header_top">
        <div class="container">
            <div class="hleft">
                <a class="header-brand" href="index.html"><i class="fa fa-graduation-cap brand-logo"></i></a>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fe fe-align-center"></i></a>
                    <a href="page-search.html" class="nav-link icon"><i class="fe fe-search" data-toggle="tooltip" data-placement="right" title="Search..."></i></a>
                    <a href="javascript:void(0)" class="nav-link icon theme_btn"><i class="fe fe-feather"></i></a>
                    <a href="javascript:void(0)" class="nav-link icon settingbar"><i class="fe fe-settings"></i></a>
                </div>
            </div>
            <div class="hright">
                <a href="javascript:void(0)" class="nav-link icon right_tab"><i class="fe fe-align-right"></i></a>
                <a href="login.html" class="nav-link icon settingbar"><i class="fe fe-power"></i></a>                
            </div>
        </div>
    </div>
          <!-- Start Quick menu with more functio -->
    <!-- Start Main leftbar navigation -->
    <div id="left-sidebar" class="sidebar">
        <h5 class="brand-name">Ericsson<a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu-uni">Employee</a></li>
            </ul>
        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="menu-uni" role="tabpanel">
                <nav class="sidebar-nav">
                    <ul class="metismenu">
                        <li ><a href="dashboard.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                        <li ><a href="task.php"><i class="fa fa-list-ul"></i><span>Tasks</span></a></li>
                        <li><a href="leave.html" data-toggle="modal" data-target="#leaveModal"><i class="fa fa-flag"></i><span>Apply Leave</span></a></li>
                        <li class="active"><a href="leave_status.php"><i class="fa fa-folder"></i><span>Leave status</span></a></li>
                        </ul>
                </nav>
            </div>
            </div>
    </div>
    <!-- Start project content area -->
    <div class="page">
        <!-- Start Page header -->
        <div class="section-body" id="page_top">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="left">                        
                        </div>
                    <div class="right">
                        <div class="notification d-flex">
                            
                                                       <div class="dropdown d-flex">
                                <a href="javascript:void(0)" class="chip ml-3" data-toggle="dropdown">
                                    <span class="avatar" style="background-image: url(../assets/images/xs/avatar5.jpg)"></span> <?php 
                                     echo $_SESSION['name']; ?></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                
                                <a class="dropdown-item" href="logout.php"><i class="dropdown-icon fe fe-log-out"></i> Sign out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Page title and tab -->
        <div class="section-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="header-action">
                        <h1 class="page-title">Tasks</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Employee</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Leaves</li>
                        </ol>
                    </div>
                    <ul class="nav nav-tabs page-header-tab">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#admin-Dashboard">Dashboard</a></li>
                                           </ul>
                </div>
            </div>
        </div>
        <div class="section-body mt-4">
          <!-- Table to show tasks -->
          <div class="card">
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Leave Reason</th>                                            
                                            <th>Duration</th>
                                            <th>Status</th>                                         
                                            </tr>
                                    </thead>
                                    <?php
                                    include '../backend/dbconnection.php';
                                    $sql="SELECT * FROM `leaves` where emp_id='$_SESSION[emp_id]'";
                                    $res=mysqli_query($conn,$sql);
                                    if($res){
                                        $count=1;
                                        while($leave=mysqli_fetch_assoc($res)){
                                            echo '
                                            <tr>
                                             <td>' . $count . '</td>
                                           
                                            <td>
                                                <h6 class="mb-0">' . $leave['reason'] . '</h6>
                                                                                           </td>
                                            <td>
                                                <div class="text-info">Start: ' . $leave['start'] . '</div>
                                                <div class="text-pink">End: ' . $leave['end'] . '</div>
                                            </td>  
                                            <td>
                                                <h6 class="mb-0">' . $leave['status'] . '</h6>
                                                                                           </td>
                                            <td>
                                                  
                                                </tr> ';
                                                $count=$count+1;
                                        
        
                                        }
                                    }
                                    

                                    ?>
                                    <tbody>
                                </table>
                            </div>
                            </div>
                            </div>
        </div>


            </div>    
</div>
<?php 
include 'apply_leave.php';
?>

<!-- Start Main project js, jQuery, Bootstrap -->
<script src="../assets/bundles/lib.vendor.bundle.js"></script>

<!-- Start all plugin js -->
<script src="../assets/bundles/counterup.bundle.js"></script>
<script src="../assets/bundles/apexcharts.bundle.js"></script>
<script src="../assets/bundles/summernote.bundle.js"></script>

<!-- Start project main js  and page js -->
<script src="../assets/js/core.js"></script>
<script src="assets/js/page/index.js"></script>
<script src="assets/js/page/summernote.js"></script>
</body>


</body>
</html>