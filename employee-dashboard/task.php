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
   
          <!-- Start Quick menu with more functio -->
    <!-- Start Main leftbar navigation -->
    <div id="left-sidebar" class="sidebar">
        <h5 class="brand-name">Matz Solutions<a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu-uni">Employee</a></li>
            </ul>
        <div class="tab-content mt-3">
            <div class="tab-pane fade show active" id="menu-uni" role="tabpanel">
                <nav class="sidebar-nav">
                    <ul class="metismenu">
                        <li ><a href="dashboard.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                        <li class="active"><a href="task.php"><i class="fa fa-list-ul"></i><span>Tasks</span></a></li>
                        <li><a href="leave.html" data-toggle="modal" data-target="#leaveModal"><i class="fa fa-flag"></i><span>Apply Leave</span></a></li>
                        <li><a href="leave_status.php"><i class="fa fa-folder"></i><span>Leave status</span></a></li>
                        <li><a href="my_performance.php"><i class="fa fa-line-chart"></i><span>My Performance</span></a></li>  
                        <li><a href="attendance.php"><i class="fa fa-calendar-check-o"></i><span>Attendance</span></a></li>

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
                            <li class="breadcrumb-item active" aria-current="page">Tasks</li>
                        </ol>
                    </div>
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
                                            <th>Task ID</th>
                                            <th>Task</th>                                            
                                            <th>Duration</th>
                                            <th>Status</th>                                         
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    include '../backend/dbconnection.php';
                                    $sql="SELECT * FROM `taskboard` where emp_id='$_SESSION[emp_id]'";
                                    $res=mysqli_query($conn,$sql);
                                    $currentDate=date('Y-m-d');
                                    if($res){
                                        while($task=mysqli_fetch_assoc($res)){
                                            echo '
                                            <tr>
                                            <td>' . $task['task_id'] . '</td>
                                            <td>
                                                <h6 class="mb-0">' . $task['title'] . '</h6>
                                                <span>' . $task['description'] . '</span>
                                            </td>';
                                            if($task['end_date']<$currentDate){
                                                echo'
                                                <td>
                                                    <div class="text-info">Start: ' . $task['start_date'] . '</div>
                                                    <div class="text-pink">End: ' . $task['end_date'] . '</div>
                                                </td>';
            
                                            }
                                            else{
                                                echo'
                                                <td>
                                                    <div class="text-info">Start: ' . $task['start_date'] . '</div>
                                                    <div class="text-info">End: ' . $task['end_date'] . '</div>
                                                </td>';
            
                                            }
                                                if ($task['status'] == 'Planned') {
                                                    echo '
                                                <td>
                                                <span class="tag tag-blue">Planned</span>
                                            </td>
                                            
                                                ';
                                                } elseif ($task['status'] == 'Completed') {
        
                                                    echo '
                                                <td>
                                                <span class="tag tag-green">Completed</span>
                                            </td>
                                                                                 ';
                                                } elseif ($task['status'] == 'In progress') {
                                                    echo '
                                                <td>
                                                    <span class="tag tag-orange">In progress</span>
                                                </td>
        
                                                ';
                                                }
        
                                                echo '
                                                
                                                <td>
                                                <form method="post" action="edit_task.php" style="display:inline;">
                                    <input type="hidden" name="task_id" value="'.$task['task_id'].'">
                                    <button type="submit" class="btn btn-icon btn-sm" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </button>
                    </form>
                 
                                                </td>
                                                </tr> ';
        
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