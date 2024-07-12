<?php 
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
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <title>Salary</title>

    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="../assets/plugins/datatable/dataTables.bootstrap4.min.css">

    <!-- Core css -->
    <link rel="stylesheet" href="../assets/css/style.min.css" />
    <style>
        #chequeInput {
            display: none;
        }
    </style>
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
                            <li data-theme="azure">
                                <div class="azure"></div>
                            </li>
                            <li data-theme="indigo">
                                <div class="indigo"></div>
                            </li>
                            <li data-theme="purple">
                                <div class="purple"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                            </li>
                            <li data-theme="cyan" class="active">
                                <div class="cyan"></div>
                            </li>
                            <li data-theme="blush">
                                <div class="blush"></div>
                            </li>
                            <li data-theme="white">
                                <div class="bg-white"></div>
                            </li>
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
            <h5 class="brand-name">Matz Solution<a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
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
                            <li><a href="departments.html"><i class="fa fa-database"></i><span>Departments</span></a></li>
                            <li><a href="holiday.php"><i class="fa fa-bullhorn"></i><span>Holiday</span></a></li>
                            <li class="g_heading">Extra</li>
                            <li><a href="events.html"><i class="fa fa-calendar"></i><span>Calender</span></a></li>
                            <!-- <li><a href="app-chat.html"><i class="fa fa-comments-o"></i><span>Chat App</span></a></li> -->
                            <li><a href="app-contact.php"><i class="fa fa-address-book"></i><span>Contact</span></a></li>
                            <!-- <li><a href="app-filemanager.html"><i class="fa fa-folder"></i><span>FileManager</span></a></li> -->
                            <!-- <li><a href="our-centres.html"><i class="fa fa-map"></i><span>OurCentres</span></a></li> -->
                            <!-- <li><a href="gallery.html"><i class="fa fa-camera-retro"></i><span>Gallery</span></a></li> -->
                        </ul>
                    </nav>
                </div>
                <div class="tab-pane fade show active" id="menu-admin" role="tabpanel">
                    <nav class="sidebar-nav">
                        <ul class="metismenu">
                            <li class="active"><a href="payments.php"><i class="fa fa-credit-card"></i><span>Payments</span></a></li>
                            <li><a href="taskboard.php"><i class="fa fa-list-ul"></i><span>Taskboard</span></a></li>
                            <li><a href="attendance.php"><i class="fa fa-calendar-check-o"></i><span>Attendance</span></a></li>
                            <li><a href="leave.php"><i class="fa fa-flag"></i><span>Leave</span></a></li>
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
                    </div>
                </div>
            </div>
            <!-- Start Page title and tab -->
            <div class="section-body">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="header-action">
                            <h1 class="page-title">Salary</h1>
                            <ol class="breadcrumb page-breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Matz Solution</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Salary</li>
                            </ol>
                        </div>
                        <ul class="nav nav-tabs page-header-tab">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Fees-all">List</a></li>
                            <!-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Fees-Receipt">Fees Receipt</a></li> -->
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Fees-add">Add Salary</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section-body mt-4">
                <div class="container-fluid">
                    <div class="tab-content">
                        <div class="tab-pane active" id="Fees-all">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Display Salary of all Employees -->
                                    <div class="table-responsive">
                                        <table class="table table-hover text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                            <thead>
                                                <tr>
                                                    <th>Employee ID.</th>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Payment Type</th>
                                                    <th>Salary</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                include '../backend/dbconnection.php';
                                                $select_query = "SELECT p.*,e.f_name,e.l_name FROM `payments` p INNER JOIN `employees` e ON e.id=p.emp_id";
                                                $result = mysqli_query($conn, $select_query);
                                                while ($employee_payment = mysqli_fetch_assoc($result)) {
                                                    $select_sal = "SELECT salary from employees where id ={$employee_payment['emp_id']}";
                                                    $res = mysqli_query($conn, $select_sal);
                                                    if ($res) {
                                                        $sal = mysqli_fetch_assoc($res);
                                                    }
                                                    echo '
                                            <tr>
                                                <td>' . $employee_payment['emp_id'] . '</td>
                                                <td>' . $employee_payment['f_name'] . ' ' . $employee_payment['l_name'] . '</td>
                                                <td>' . $employee_payment['date'] . '</td>';
                                                    if ($employee_payment['payment_method'] == 'Cheque') {
                                                        echo '   <td>
                                                    <div>
                                                    ' . $employee_payment['payment_method'] . '
                                                    </div>
                                                    <div>Cheque no: 
                                                    ' . $employee_payment['cheque_number'] . '
                                                    </div>
                                                    </td>';
                                                    } else {
                                                        echo ' <td>' . $employee_payment['payment_method'] . '</td>';
                                                    }

                                                    if ($employee_payment['salary'] < $sal['salary']) {
                                                        $remaining = $sal['salary'] - $employee_payment['salary'];
                                                        echo '<td>
                                        <div>Paid: ' . $employee_payment['salary'] . '</div>
                                        <div class="text-pink">Remaining: ' . $remaining . '</div>
                                    </td>';
                                                    } else {
                                                        echo '   <td>' . $employee_payment['salary'] . '</td>';
                                                    }


                                                    if ($employee_payment['payment_status'] == 'Paid') {
                                                        echo '<td><span class="tag tag-green">paid</span></td>';
                                                    } else {
                                                        echo ' <td><span class="tag tag-red">unpaid</span></td> ';
                                                    }
                                                    echo ' 
                                               <td>
                                               <a href="../organization/edit_payment.php?edit_id=' . $employee_payment['payment_id'] . '" class="btn btn-icon btn-sm" title="Edit"
                                            data-type="confirm">
                                            <i class="fa fa-edit"></i>
                                            </a>                    
                                            <a href="../backend/payments.php?del_id=' . $employee_payment['payment_id'] . '" class="btn btn-icon btn-sm js-sweetalert" title="Delete"
                                            data-type="confirm">
                                            <i class="fa fa-trash-o text-danger"></i>
                                            </a>
                                                           </td>

                                                </tr>';
                                                }

                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- This is section to Add Salary -->
                        <div class="tab-pane" id="Fees-add">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Add Salary</h3>
                                    <div class="card-options ">
                                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                    </div>
                                </div>
                                <form class="card-body" method="post" action="../backend/payments.php">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Employee<span class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <select class="form-control show-tick" name="emp_id" Required>
                                                <option value="">Select</option>
                                                <?php
                                                $sql = "SELECT `id`, concat(`f_name`,' ',`l_name`) as `name` FROM `employees`";
                                                $res = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($res)) {
                                                    while ($row = mysqli_fetch_assoc($res)) {
                                                ?>
                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label"> Date <span class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="" name="date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Salary <span class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="salary">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Payment Method <span class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <select class="form-control" name="payment_method" id="paymentMethod">
                                                <option value="">Select...</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Cheque">Cheque</option>
                                                <option value="Credit Card">Credit Card</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row" id="chequeInput">
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="cheque_number" placeholder="Enter Cheque Number">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label"></label>
                                        <div class="col-md-7">
                                            <button type="submit" class="btn btn-primary" name="submit_salary">Submit</button>
                                            <a href="payments.php" class="btn btn-outline-secondary">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('paymentMethod').addEventListener('change', function() {
            var chequeInput = document.getElementById('chequeInput');
            if (this.value === 'Cheque') {
                chequeInput.style.display = 'block';
            } else {
                chequeInput.style.display = 'none';
            }
        });
    </script>
    <!-- Start Main project js, jQuery, Bootstrap -->
    <script src="../assets/bundles/lib.vendor.bundle.js"></script>

    <!-- Start Plugin Js -->
    <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/bundles/dataTables.bundle.js"></script>

    <!-- Start project main js  and page js -->
    <script src="../assets/js/core.js"></script>
    <script src="assets/js/table/datatable.js"></script>
</body>

</html>