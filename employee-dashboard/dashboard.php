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
                            <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                            <li><a href="task.php"><i class="fa fa-list-ul"></i><span>Tasks</span></a></li>
                            <li><a href="#" data-toggle="modal" data-target="#leaveModal"><i class="fa fa-flag"></i><span>Apply Leave</span></a></li>
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

                                <!-- <div class="dropdown d-flex">
                                <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown"><i class="fa fa-envelope"></i><span class="badge badge-success nav-unread"></span></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <ul class="right_chat list-unstyled w350 p-0">
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object" src="../assets/images/xs/avatar4.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Donald Gardner</span>
                                                    <div class="message">It is a long established fact that a reader</div>
                                                    <small>11 mins ago</small>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="../assets/images/xs/avatar5.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Wendy Keen</span>
                                                    <div class="message">There are many variations of passages of Lorem Ipsum</div>
                                                    <small>18 mins ago</small>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>                            
                                        </li>
                                        <li class="offline">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="../assets/images/xs/avatar2.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Matt Rosales</span>
                                                    <div class="message">Contrary to popular belief, Lorem Ipsum is not simply</div>
                                                    <small>27 mins ago</small>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>                            
                                        </li>
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="../assets/images/xs/avatar3.jpg" alt="">
                                                <div class="media-body">
                                                    <span class="name">Phillip Smith</span>
                                                    <div class="message">It has roots in a piece of classical Latin literature from 45 BC</div>
                                                    <small>33 mins ago</small>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>                            
                                        </li>                        
                                    </ul>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item text-center text-muted-dark readall">Mark all as read</a>
                                </div>
                            </div> -->
                                <div class="dropdown d-flex">
                                    <?php
                                    require '../backend/dbconnection.php';
                                    //  number of days to consider as "near"
                                    $daysToConsider = 2;
                                    $currentDate = date('Y-m-d');
                                    $nearDate = date('Y-m-d', strtotime($currentDate . ' + ' . $daysToConsider . ' days'));
                                    $sql = "SELECT title, end_date FROM taskboard 
                                WHERE emp_id='$_SESSION[emp_id]' and `status`  IN ('In progress', 'Planned') And
                                end_date BETWEEN '$currentDate' AND '$nearDate'";
                                    $result = $conn->query($sql);
                                    $nearDateTask = $result->num_rows > 0;
                                    ?>
                                    <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown"><i class="fa fa-bell"></i>
                                        <?php if ($nearDateTask) : ?>
                                            <span class="badge badge-primary nav-unread">
                                            <?php endif; ?>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <ul class="list-unstyled feeds_widget">
                                            <?php
                                            if ($nearDateTask) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $taskName = $row['title'];
                                                    $endDate = $row['end_date'];
                                            ?>
                                                    <li>
                                                        <div class="feeds-left">
                                                            <span class="avatar avatar-red"><i class="fa fa-info"></i></span>
                                                        </div>

                                                        <div class="feeds-body ml-3">
                                                            <p class="text-muted mb-0"><?php echo $taskName ?> <strong class="text-blue font-weight-bold">Task</strong> is due on <br>
                                                                <strong class="text-red font-weight-bold"><?php echo date('d-m-Y', strtotime($endDate)) ?></strong>
                                                            </p>
                                                        </div>
                                                    </li>
                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <li>


                                                    <div class="feeds-body ml-3">
                                                        <p class="text-muted mb-0">No tasks are near the deadline.
                                                        </p>
                                                    </div>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>

                                    </div>
                                </div>
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
                            <h1 class="page-title">Dashboard</h1>
                            <ol class="breadcrumb page-breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Employee</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                        <ul class="nav nav-tabs page-header-tab">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#admin-Dashboard">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section-body mt-4">
                <h5>Instructions for Employees</h5>
                <ul>
                    <li>Complete the Tasks on time</li>
                    <li>Maintain the decorum of office</li>
                </ul>


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