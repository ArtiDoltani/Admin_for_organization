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
    <!-- Bootstrap Core and vendor -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Plugins css -->
    <link rel="stylesheet" href="../assets/plugins/summernote/dist/summernote.css" />
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
        <!-- Start Quick menu with more functions -->
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
                            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                            <li><a href="task.php"><i class="fa fa-list-ul"></i><span>Tasks</span></a></li>
                            <li><a href="#" data-toggle="modal" data-target="#leaveModal"><i class="fa fa-flag"></i><span>Apply Leave</span></a></li>
                            <li><a href="leave_status.php"><i class="fa fa-folder"></i><span>Leave status</span></a></li>
                            <li class="active"><a href="my_performance.php"><i class="fa fa-line-chart"></i><span>My Performance</span></a></li>
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
                            <h1 class="page-title">Performance</h1>
                            <ol class="breadcrumb page-breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Employee</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Performance</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-body mt-4">
                <div id="performanceChart"></div>
            </div>
            <?php
            // Database connection
            include '../backend/dbconnection.php';
            // Function to get task count for a given month and year
            function getTaskCounts($conn, $emp_id, $month, $year) {
                $sql = "SELECT `status`, COUNT(*) as count FROM taskboard
                        WHERE emp_id = ? AND MONTH(end_date) = ? AND YEAR(end_date) = ?
                        GROUP BY `status`";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iii", $emp_id, $month, $year);
                $stmt->execute();
                $result = $stmt->get_result();

                $taskCounts = ['Completed' => 0, 'In progress' => 0, 'Planned' => 0];
                while ($row = $result->fetch_assoc()) {
                    $taskCounts[$row['status']] = $row['count'];
                }

                return $taskCounts;
            }
            $emp_id = $_SESSION['emp_id'];

            // Get current month and previous month
            $currentMonth = date('n');
            $currentYear = date('Y');
            $previousMonth = $currentMonth == 1 ? 12 : $currentMonth - 1;
            $previousMonthYear = $currentMonth == 1 ? $currentYear - 1 : $currentYear;
            $currentMonthTasks = getTaskCounts($conn, $emp_id, $currentMonth, $currentYear);
            $previousMonthTasks = getTaskCounts($conn, $emp_id, $previousMonth, $previousMonthYear);

            // Encode the data for ApexCharts
            $chartData = [
                'categories' => ['Completed', 'In Progress', 'Planned'],
                'series' => [
                    [
                        'name' => date('F Y', mktime(0, 0, 0, $previousMonth, 10, $previousMonthYear)),
                        'data' => array_values($previousMonthTasks)
                    ],
                    [
                        'name' => date('F Y', mktime(0, 0, 0, $currentMonth, 10, $currentYear)),
                        'data' => array_values($currentMonthTasks)
                    ]
                ]
            ];

            $conn->close();
            ?>

            <script>
                // Get the chart data from PHP
                var chartData = <?php echo json_encode($chartData); ?>;

                var options = {
                    chart: {
                        type: 'bar'
                    },
                    series: chartData.series,
                    xaxis: {
                        categories: chartData.categories
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    yaxis: {
                        title: {
                            text: 'Count'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return val;
                            }
                        }
                    }
                };

                var chart = new ApexCharts(document.querySelector("#performanceChart"), options);
                chart.render();
            </script>

            <!-- Leave Modal-->
            <?php
            include 'apply_leave.php';
            ?>

            <!-- Start Main project js, jQuery, Bootstrap -->
            <script src="../assets/bundles/lib.vendor.bundle.js"></script>
            <!-- Start all plugin js -->
            <script src="../assets/bundles/counterup.bundle.js"></script>
            <script src="/assets/bundles/apexcharts.bundle.js"></script>
            <script src="../assets/bundles/summernote.bundle.js"></script>
            <!-- Start project main js and page js -->
            <script src="../assets/js/core.js"></script>
            <script src="assets/js/page/index.js"></script>
            <script src="assets/js/page/summernote.js"></script>
</body>

</html>
