<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
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

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Plugins css -->
    <link rel="stylesheet" href="../assets/plugins/summernote/dist/summernote.css" />


    <!-- Core css -->
    <link rel="stylesheet" href="../assets/css/style.min.css" />

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
                            <li><a href="task.php"><i class="fa fa-list-ul"></i><span>Tasks</span></a></li>
                            <li><a href="#" data-toggle="modal" data-target="#leaveModal"><i class="fa fa-flag"></i><span>Apply Leave</span></a></li>
                            <li><a href="leave_status.php"><i class="fa fa-folder"></i><span>Leave status</span></a></li>
                            <li><a href="my_performance.php"><i class="fa fa-line-chart"></i><span>My Performance</span></a></li>
                            <li class="active"><a href="attendance.php"><i class="fa fa-calendar-check-o"></i><span>Attendance</span></a></li>

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
                                        <span class="avatar" style="background-image: url(../assets/images/xs/avatar5.jpg)"></span>
                                        <?php
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
                            <h1 class="page-title">Attendance</h1>
                            <ol class="breadcrumb page-breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Employee</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Attendance</li>
                            </ol>
                        </div>
                        </div>
                </div>
            </div>
            <div class="section-body mt-4">
               
                <form action="" method="POST">
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group ">
                        <label> From </label>                                    
                        <input type="date" Required class="form-control" name="start_date">
                
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label> To </label>                                    
                        <input type="date" Required class="form-control" name="end_date">
                
                                            </div>

                                            </div>
                                            
                                        </div>
                                        <div>                    
                                       
                                        <button type="submit" class="btn btn-primary">Check</button>
                
                                        </div>
                </form>
                     <!-- Attendance -->

                <div class="card my-4">
                    <div class="card-body my-4">
                    <div class="table-responsive">
                                <table class="table table-hover text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Sign in</th>                                            
                                            <th>Sign out</th>
                                            <th>Status</th>
                                            <th>Date</th>                                      
                                            </tr>
                                    </thead>
                                    <tbody>
                                    <?php
require '../backend/dbconnection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "SELECT * FROM `attendance` WHERE emp_id='$_SESSION[emp_id]' 
    AND `date` BETWEEN '$start_date' AND '$end_date'";
    $res = mysqli_query($conn, $sql);
    $attendance_data = [];
    
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $attendance_data[$row['date']] = $row;
        }
    }

    //all dates in the range
    $period = new DatePeriod(
        new DateTime($start_date),
        new DateInterval('P1D'),
        (new DateTime($end_date))->modify('+1 day')
    );

    $count = 1;
    foreach ($period as $date) {
        $current_date = $date->format('Y-m-d');
        $is_sunday = $date->format('w') == 0;

        echo '<tr' . ($is_sunday ? ' style="background-color: #f2dede;"' : '') . '>';
        echo '<td>' . $count . '</td>';

        if (isset($attendance_data[$current_date])) {
            $row = $attendance_data[$current_date];
            echo '
                <td><h6 class="text-info mb-0">' . $row['login_time'] . '</h6></td>
                <td><h6 class="text-pink mb-0">' . $row['logout_time'] . '</h6></td>';
            if ($row['is_absent'] == 0) {
                echo '<td><h6>Present</h6></td>';
            } else {
                echo '<td><h6>Absent</h6></td>';
            }
        } else {
            echo '
                <td><h6 class="text-info mb-0">00:00:00</h6></td>
                <td><h6 class="text-pink mb-0">00:00:00</h6></td>';
                if ($is_sunday) {
                    echo '<td><h6><strong>Sunday</strong></h6></td>';
                }else{
                    echo'
                    <td><h6>Absent</h6></td>';
                    
                    
                }
        }

        echo '<td><h6 class="mb-0">' . $date->format('d-m-Y') . '</h6></td>';
        
        echo '</tr>';

        $count++;
    }
}
?>
                                    </tbody>
                                     </table>
                            </div>

                    </div>
                </div>

            </div>


            <!-- Leave Modal-->
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