<?php 
 include '../backend/dbconnection.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
header("location:all_login.html");
exit;
}
?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="logo.png" type="image/x-icon"/>
<title>Attendance</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" />

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
    <!-- Start Rightbar setting panel -->
    <div id="rightsidebar" class="right_sidebar">
        <a href="javascript:void(0)" class="p-3 settingbar float-right"><i class="fa fa-close"></i></a>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Settings" aria-expanded="true">Settings</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#activity" aria-expanded="false">Activity</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane vivify fadeIn active" id="Settings" aria-expanded="true">
                <div class="mb-4">
                    <h6 class="font-14 font-weight-bold text-muted">Theme Color</h6>
                    <ul class="choose-skin list-unstyled mb-0">
                        <li data-theme="azure"><div class="azure"></div></li>
                        <li data-theme="indigo"><div class="indigo"></div></li>
                        <li data-theme="purple"><div class="purple"></div></li>
                        <li data-theme="orange"><div class="orange"></div></li>
                        <li data-theme="green"><div class="green"></div></li>
                        <li data-theme="cyan" class="active"><div class="cyan"></div></li>
                        <li data-theme="blush"><div class="blush"></div></li>
                        <li data-theme="white"><div class="bg-white"></div></li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h6 class="font-14 font-weight-bold text-muted">Font Style</h6>
                    <div class="custom-controls-stacked font_setting">
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="font" value="font-muli" checked="">
                            <span class="custom-control-label">Muli Google Font</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="font" value="font-montserrat">
                            <span class="custom-control-label">Montserrat Google Font</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="font" value="font-poppins">
                            <span class="custom-control-label">Poppins Google Font</span>
                        </label>
                    </div>
                </div>
                <div>
                    <h6 class="font-14 font-weight-bold mt-4 text-muted">General Settings</h6>
                    <ul class="setting-list list-unstyled mt-1 setting_switch">
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">Night Mode</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-darkmode">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">Fix Navbar top</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-fixnavbar">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">Header Dark</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-pageheader">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">Min Sidebar Dark</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-min_sidebar">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">Sidebar Dark</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-sidebar">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">Icon Color</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-iconcolor">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">Gradient Color</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-gradient" checked="">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">Box Shadow</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-boxshadow">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">RTL Support</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-rtl">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                        <li>
                            <label class="custom-switch">
                                <span class="custom-switch-description">Box Layout</span>
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-boxlayout">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </li>
                    </ul>
                </div>
                <hr>
                <div class="form-group">
                    <label class="d-block">Storage <span class="float-right">77%</span></label>
                    <div class="progress progress-sm">
                        <div class="progress-bar" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                    </div>
                    <button type="button" class="btn btn-primary btn-block mt-3">Upgrade Storage</button>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane vivify fadeIn" id="activity" aria-expanded="false">
                <ul class="new_timeline mt-3">
                    <li>
                        <div class="bullet pink"></div>
                        <div class="time">11:00am</div>
                        <div class="desc">
                            <h3>Attendance</h3>
                            <h4>Computer Class</h4>
                        </div>
                    </li>
                    <li>
                        <div class="bullet pink"></div>
                        <div class="time">11:30am</div>
                        <div class="desc">
                            <h3>Added an interest</h3>
                            <h4>“Volunteer Activities”</h4>
                        </div>
                    </li>
                    <li>
                        <div class="bullet green"></div>
                        <div class="time">12:00pm</div>
                        <div class="desc">
                            <h3>Developer Team</h3>
                            <h4>Hangouts</h4>
                            <ul class="list-unstyled team-info margin-0 p-t-5">                                            
                                <li><img src="../assets/images/xs/avatar1.jpg" alt="Avatar"></li>
                                <li><img src="../assets/images/xs/avatar2.jpg" alt="Avatar"></li>
                                <li><img src="../assets/images/xs/avatar3.jpg" alt="Avatar"></li>
                                <li><img src="../assets/images/xs/avatar4.jpg" alt="Avatar"></li>                                            
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div class="bullet green"></div>
                        <div class="time">2:00pm</div>
                        <div class="desc">
                            <h3>Responded to need</h3>
                            <a href="javascript:void(0)">“In-Kind Opportunity”</a>
                        </div>
                    </li>
                    <li>
                        <div class="bullet orange"></div>
                        <div class="time">1:30pm</div>
                        <div class="desc">
                            <h3>Lunch Break</h3>
                        </div>
                    </li>
                    <li>
                        <div class="bullet green"></div>
                        <div class="time">2:38pm</div>
                        <div class="desc">
                            <h3>Finish</h3>
                            <h4>Go to Home</h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Start Main leftbar navigation -->
    <div id="left-sidebar" class="sidebar">
        <h5 class="brand-name">Matz Solutions<a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#menu-uni">Organization</a></li>
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu-admin">Admin</a></li>
        </ul>
        <div class="tab-content mt-3">
            <div class="tab-pane fade" id="menu-uni" role="tabpanel">
                <nav class="sidebar-nav">
                    <ul class="metismenu">
                        <li><a href="admin_dashboard.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                        <li><a href="employees.php"><i class="fa fa-black-tie"></i><span>Employees</span></a></li>
                        <!-- <li><a href="staff.php"><i class="fa fa-user-circle-o"></i><span>Staff</span></a></li> -->
                       <li><a href="teams.php"><i class="fa fa-users"></i><span>Teams</span></a></li>                        
                        <li><a href="departments.php"><i class="fa fa-database"></i><span>Departments</span></a></li>
                        <li><a href="holiday.php"><i class="fa fa-bullhorn"></i><span>Holiday</span></a></li>
                        <li class="g_heading">Extra</li>
                        <li><a href="events.html"><i class="fa fa-calendar"></i><span>Calender</span></a></li>
                        <li><a href="app-contact.php"><i class="fa fa-address-book"></i><span>Contact</span></a></li>
                             </ul>
                </nav>
            </div>
            <div class="tab-pane fade show active" id="menu-admin" role="tabpanel">
                <nav class="sidebar-nav">
                    <ul class="metismenu">
                        <li><a href="payments.php"><i class="fa fa-credit-card"></i><span>Payments</span></a></li>
                        <li><a href="taskboard.php"><i class="fa fa-list-ul"></i><span>Taskboard</span></a></li>
                        <li class="active"><a href="attendance.php"><i class="fa fa-calendar-check-o"></i><span>Attendance</span></a></li>
                        <li><a href="leave.php"><i class="fa fa-flag"></i><span>Leave</span></a></li>
                        <!-- <li><a href="setting.html"><i class="fa fa-gear"></i><span>Settings</span></a></li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Start project content area -->
    <div class="page"> 
        <!-- Start Page title and tab -->
        <div class="section-body my-4">
            <div class="container-fluid">
                <div class="d-flex justify-content-between align-items-center ">
                    <div class="header-action">
                        <h1 class="page-title">Attendance</h1>
                        <ol class="breadcrumb page-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Matz Solutions</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Attendance</li>
                        </ol>
                    </div>
                    <!-- <a href="javascript:void(0)" class="btn btn-info btn-sm">Export Excel</a> -->
                </div>
            </div>
        </div>
<?php
require '../backend/dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['emp_id']) && isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $emp_id = $_POST['emp_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "SELECT * FROM `attendance` WHERE emp_id='$emp_id' AND `date` BETWEEN '$start_date' AND '$end_date'";
    $res = mysqli_query($conn, $sql);
    $attendance_data = [];

    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $attendance_data[$row['date']] = $row;
        }
    }

    // all dates in the range
    $period = new DatePeriod(
        new DateTime($start_date),
        new DateInterval('P1D'),
        (new DateTime($end_date))->modify('+1 day')
    );
    // Counters for different statuses
    $present_count = 0;
    $leave_count = 0;
    $absent_count = 0;
    $wfh_count = 0;
    $month_name = date('F', strtotime($start_date));
}
?>
<div class="section-body mt-4">
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Select Employee</label>
                    <div class="col-sm-9">
                        <select required class="form-control show-tick" name="emp_id">
                            <option value="">Select</option>
                            <?php
                            $sql = "SELECT `id`, concat(`f_name`, ' ', `l_name`) as name FROM `employees`";
                            $res = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res)) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">From</label>
                    <div class="col-sm-9">
                        <input type="date" required class="form-control" name="start_date">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">To</label>
                    <div class="col-sm-9">
                        <input type="date" required class="form-control" name="end_date">
                    </div>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <?php if (isset($period)) { ?>
        <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Attendance</h3>
                                    <div class="card-options ">
                                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                    </div>
                                </div>
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
                                if ($row['status'] == 'present' ) {
                                     echo '<td><h6>Present</h6></td>';
                                       $present_count++;
                                }
                                elseif ($row['status'] == 'leave') {
                                     echo '<td><h6>Leave </h6></td>';
                                       $leave_count++;
                                }
                                  elseif ($row['status'] == 'WFH') {
                                     echo '<td><h6>WFH </h6></td>';
                                       $wfh_count++;
                                       // $present_count++;
                                }
                                else{
                                     echo '<td><h6>Absent </h6></td>';
                                     $absent_count++;
                                     
                                }
                           
                        } else {
                            echo '
                                <td><h6 class="text-info mb-0">00:00:00</h6></td>
                                <td><h6 class="text-pink mb-0">00:00:00</h6></td>';
                                if($is_sunday){
                                     echo '<td><h6><strong>Sunday</strong></h6></td>';
                                }
                                else{
                                     echo '<td><h6>Absent</h6></td>';
                                     $absent_count++;
                                }
                        }
                        echo '<td><h6 class="mb-0">' . $date->format('d-m-Y') . '</h6></td>';
                        echo '</tr>';
                        $count++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
         <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title">Summary</h3>
            </div>
            <div class="card-body">
                 <?php 
                 $sql = "SELECT  concat(`f_name`, ' ', `l_name`) as name FROM `employees` where `id`='$_POST[emp_id]'";
                 $res = mysqli_query($conn, $sql);
                 if ($res){
                    $employee=mysqli_fetch_assoc($res);
                    echo ' <p>Emplyee Name: '.$employee['name'].'></p>
                    <p>Total Present: '.$present_count.'</p>
                    <p>Total Leave: '.$leave_count.'</p>
                    <p>Total Absent:'. $absent_count.'</p>
                    <p>Total WFH: '.$wfh_count.'</p>';
                 }
                 else{
                    echo 'No Data Found';
                 }
                 ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-vcenter mb-0 text-nowrap table-bordered">
                <thead>
                    <?php
                    $firstDayOfMonth = date("Y-m-01");
                    $currentmonth= date("M");
                    $total_days_in_month = date("t", strtotime($firstDayOfMonth));
                    $sql = "SELECT * FROM employees";
                    $result = mysqli_query($conn, $sql);
                    $total_employees = mysqli_num_rows($result);
                    $employees = [];
                    $employees_id = [];
                    $counter = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $employees[] = $row['f_name'] . ' ' . $row['l_name'];
                        $employees_id[] = $row['id'];
                    }
                    echo '<tr><th>Employee</th>';
                    for ($j = 1; $j <= $total_days_in_month; $j++) {
                        echo '<th>' . $j . '</th>';
                    }
                    echo '</tr>';
                    for ($i = 0; $i < $total_employees; $i++) {
                        echo '<tr><td>' . $employees[$i] . '</td>                     
                        ';
                        for ($j = 1; $j <= $total_days_in_month; $j++) {
                            $date_of_attendance = date('Y-m-' . $j);
                            $employee_attendance = mysqli_query($conn, "SELECT `is_absent`, `status` FROM `attendance` WHERE `emp_id`='" . $employees_id[$i] . "' AND `date`= '$date_of_attendance'") or die(mysqli_errno($conn));
                            $is_attendance_added = mysqli_num_rows($employee_attendance);
                            if ($is_attendance_added > 0) {
                                $employeeAttendance = mysqli_fetch_assoc($employee_attendance);
                                if ($employeeAttendance['status'] == 'present' || $employeeAttendance['status'] == 'WFH') {
                                    echo '<td><i class="icon-user-following"></i> </td>';
                                } elseif ($employeeAttendance['status'] == 'leave') {
                                    echo '<td class="text-warning">L</td>';
                                } else {
                                    echo '<td><i class="icon-user-unfollow text-danger"></i> </td>';
                                }
                            } else {
                                echo '<td> </td>';
                            }
                        }
                        echo '                       
</tr>';
                    }
                    ?>
                </thead>
            </table>
        </div>
    <?php } ?>
</div>

<!-- Start Main project js, jQuery, Bootstrap -->
<script src="../assets/bundles/lib.vendor.bundle.js"></script>

<!-- Start Plugin Js -->

<!-- Start project main js  and page js -->
<script src="../assets/js/core.js"></script>
</body>
</html>
