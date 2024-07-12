<?php 
include '../backend/dbconnection.php';
include '../backend/taskboard.php';
?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <title>Taskboard</title>
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

    <!-- Bootstrap Core and vandor -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/plugins/nestable/jquery-nestable.css" />
    <link rel="stylesheet" href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
        <!-- <div id="header_top" class="header_top">
            <div class="container">
                <div class="hleft">
                    <a class="header-brand" href="index.html"><i class="fa fa-graduation-cap brand-logo"></i></a>
                    <div class="dropdown">
                        <a href="javascript:void(0)" class="nav-link icon menu_toggle"><i class="fe fe-align-center"></i></a>
                        <a href="page-search.html" class="nav-link icon"><i class="fe fe-search" data-toggle="tooltip" data-placement="right" title="Search..."></i></a>
                        <a href="app-email.html" class="nav-link icon app_inbox"><i class="fe fe-inbox" data-toggle="tooltip" data-placement="right" title="Inbox"></i></a>
                        <a href="app-filemanager.html" class="nav-link icon app_file xs-hide"><i class="fe fe-folder" data-toggle="tooltip" data-placement="right" title="File Manager"></i></a>
                        <a href="app-social.html" class="nav-link icon xs-hide"><i class="fe fe-share-2" data-toggle="tooltip" data-placement="right" title="Social Media"></i></a>
                        <a href="javascript:void(0)" class="nav-link icon theme_btn"><i class="fe fe-feather"></i></a>
                        <a href="javascript:void(0)" class="nav-link icon settingbar"><i class="fe fe-settings"></i></a>
                    </div>
                </div>
                <div class="hright">
                    <a href="javascript:void(0)" class="nav-link icon right_tab"><i class="fe fe-align-right"></i></a>
                    <a href="login.html" class="nav-link icon settingbar"><i class="fe fe-power"></i></a>
                </div>
            </div>
        </div> -->
        
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
                            <!-- <li><a href="app-chat.html"><i class="fa fa-comments-o"></i><span>Chat App</span></a></li> -->
                            <li><a href="app-contact.php"><i class="fa fa-address-book"></i><span>Contact</span></a></li>
                              </ul>
                    </nav>
                </div>
                <div class="tab-pane fade show active" id="menu-admin" role="tabpanel">
                    <nav class="sidebar-nav">
                        <ul class="metismenu">
                            <li><a href="payments.php"><i class="fa fa-credit-card"></i><span>Payments</span></a></li>
                            <li class="active"><a href="taskboard.php"><i class="fa fa-list-ul"></i><span>Taskboard</span></a></li>
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
            <div class="section-body">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="header-action">
                            <h1 class="page-title">TaskBoard</h1>
                            <ol class="breadcrumb page-breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Matz Solutions</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Task</li>
                            </ol>
                        </div>
                                     </div>
                </div>
            </div>
            <div class="section-body mt-4">
                <div class="container-fluid">
                    <div class="tab-content">
                        
                        
                        <!-- Edit Task -->
                        <div class="tab-pane active" id="TaskBoard-add">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Task</h3>
                                    <div class="card-options ">
                                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                    </div>
                                </div>
                                <form class="card-body" action="../backend/taskboard.php?id_edit=<?php echo $id_edit; ?>" method="POST">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Job title </label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="task_title" value="<?php echo $task['title']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Assign to</label>
                                        <div class="col-md-7">
                                            <select class="form-control show-tick" name="emp_id">
                                            <option value="">Select</option>
                                               
                                            <?php 
                                                $sql = "SELECT id, concat(f_name, ' ', l_name) as name FROM employees";
                                                $res = $conn->query($sql);
                                                if ($res->num_rows > 0) {
                                                    while ($row = $res->fetch_assoc()) {
                                                        $selected = ($task['emp_id'] == $row['id']) ? 'selected' : '';
                                                        echo "<option value='{$row['id']}' {$selected}>{$row['name']}</option>";
                                                    }
                                                }
                                                ?>                                                                </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                <label class="col-md-3 col-form-label">Priority </label>
                <div class="col-md-7">
                    <select class="form-control show-tick" name="priority">
                        <option value="">Select</option>
                        <option <?php if ($task['priority'] == 'High') {
                                                            echo 'selected';
                                                        } ?>>High</option>
                        <option <?php if ($task['priority'] == 'Medium') {
                                                            echo 'selected';
                                                        } ?>>Medium</option>
                        <option <?php if ($task['priority'] == 'Low') {
                                                            echo 'selected';
                                                        } ?>>Low</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Assigned By </label>
                <div class="col-md-7">
                    <select class="form-control show-tick" name="assigned_by">
                        <option value="">Select</option>
                        <?php 
                                                $sql = "SELECT id, concat(f_name, ' ', l_name) as name FROM employees";
                                                $res = $conn->query($sql);
                                                if ($res->num_rows > 0) {
                                                    while ($row = $res->fetch_assoc()) {
                                                        $selected = ($task['assigned_by'] == $row['id']) ? 'selected' : '';
                                                        echo "<option value='{$row['id']}' {$selected}>{$row['name']}</option>";
                                                    }
                                                }
                                                ?>                    </select>
                </div>
            </div>
            <!-- <div class="form-group row">
                <label class="col-md-3 col-form-label">Range <span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <div class="input-daterange input-group" data-provide="datepicker">
                        <input type="text" class="form-control" name="start_date" value="">
                        <span class="input-group-addon"> to </span>
                        <input type="text" class="form-control" name="end_date" value="">
                    </div>
                </div>
            </div> -->

               <div class="form-group row">
                <label class="col-md-3 col-form-label">Status</label>
                <div class="col-md-7">
                    <select class="form-control show-tick" name="status">
                        <option value="">Select</option>
                        <option value="Planned" <?php echo ($task['status'] == 'Planned') ? 'selected' : ''; ?>>Planned</option>
                        <option value="In progress" <?php echo ($task['status'] == 'In progress') ? 'selected' : ''; ?>>In progress</option>
                        <option value="Completed" <?php echo ($task['status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Description </label>
                <div class="col-md-7">
                    <textarea rows="6" class="form-control no-resize" placeholder="Please type what you want..." name="description"><?php echo $task['description']; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label"></label>
                <div class="col-md-7">
                    <button type="submit" class="btn btn-primary" name="edit_task">Submit</button>
                    <a href="taskboard.php" class="btn btn-outline-secondary">Cancel</a>
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
 CKEDITOR.replace('description');
</script>

    <!-- Start Main project js, jQuery, Bootstrap -->
    <script src="../assets/bundles/lib.vendor.bundle.js"></script>

    <!-- Start Plugin Js -->
    <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/bundles/knobjs.bundle.js"></script>
    <script src="../assets/bundles/nestable.bundle.js"></script>
    <script src="../assets/bundles/dataTables.bundle.js"></script>


    <!-- Start project main js  and page js -->
    <script src="../assets/js/core.js"></script>
    <script src="assets/js/page/sortable-nestable.js"></script>
    <script src="assets/js/chart/knobjs.js"></script>
    <script src="assets/js/table/datatable.js"></script>

</body>

</html>