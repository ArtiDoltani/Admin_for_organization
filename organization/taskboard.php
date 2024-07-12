<?php 
include '../backend/dbconnection.php';
?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <title> Taskboard</title>
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
                            <!-- <li><a href="app-filemanager.html"><i class="fa fa-folder"></i><span>FileManager</span></a></li>
                            <li><a href="our-centres.html"><i class="fa fa-map"></i><span>OurCentres</span></a></li>
                            <li><a href="gallery.html"><i class="fa fa-camera-retro"></i><span>Gallery</span></a></li> -->
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
                            <h1 class="page-title">TaskBoard</h1>
                            <ol class="breadcrumb page-breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Matz Solutions</a></li>
                                <li class="breadcrumb-item active" aria-current="page">TaskBoard</li>
                            </ol>
                        </div>
                        <ul class="nav nav-tabs page-header-tab">
                            <li class="nav-item"><a class="nav-link active" id="TaskBoard-tab" data-toggle="tab" href="#TaskBoard-all">Task List</a></li>
                            <li class="nav-item"><a class="nav-link" id="TaskBoard-tab" data-toggle="tab" href="#TaskBoard-Scrum">Scrum Type</a></li>
                            <li class="nav-item"><a class="nav-link" id="TaskBoard-tab" data-toggle="tab" href="#TaskBoard-add">Add Task</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section-body mt-4">
                <div class="container-fluid">
                    <div class="tab-content">
                        <!-- List of Tasks -->
                        <div class="tab-pane active" id="TaskBoard-all">
                            <div class="row clearfix mt-2">
                                <div class="col-lg-4 col-md-6">
                                    <div class="card">
                                    <!-- Planned -->
                                        <div class="card-body text-center">
                                            <h6>Planned</h6>
                                            <?php 
                                            $qurey="SELECT COUNT(*) as Num_of_planned FROM `taskboard` WHERE status='Planned'";
                                            $res=mysqli_query($conn,$qurey);
                                            if($res){
                                                while($status=mysqli_fetch_assoc($res)){
                                                    echo'<input type="text" class="knob" value="'.$status['Num_of_planned'].'" data-width="90" data-height="90" 
                                                    data-thickness="0.1" data-fgColor="#2185d0">';
                                                }
                                            }
                                            ?>
                                                                                    </div>
                                    </div>
                                </div>
                                <!-- In progress -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h6>In progress</h6>
                                            <?php 
                                            $qurey="SELECT COUNT(*) as Num_of_progress FROM `taskboard` WHERE status='In Progress'";
                                            $res=mysqli_query($conn,$qurey);
                                            if($res){
                                                while($status=mysqli_fetch_assoc($res)){
                                                     echo'  <input type="text" class="knob" value="'.$status['Num_of_progress'].'" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#f2711c"> ';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Completed -->
                                <div class="col-lg-4 col-md-6">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h6>Completed</h6>
                                            <?php 
                                            $qurey="SELECT COUNT(*) as Num_of_completed FROM `taskboard` WHERE status='completed'";
                                            $res=mysqli_query($conn,$qurey);
                                            if($res){
                                                while($status=mysqli_fetch_assoc($res)){
                                                     echo'  <input type="text" class="knob" value="'.$status['Num_of_completed'].'" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#21ba45"> ';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <!-- Table to show tasks -->
                            <div class="card">
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover text-nowrap js-basic-example dataTable table-striped table_custom border-style spacing5">
                                    <thead>
                                        <tr>
                                            <th>Task ID</th>
                                            <th>Task</th>
                                            <th>Assigned to</th>
                                            <th>Duration</th>
                                            <th>Status</th>
                                            <!-- <th>view</th> -->
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    include '../backend/dbconnection.php';
                                    include '../backend/taskboard.php';
                                    $tasks = show_tasks();
                                    foreach ($tasks as $task) {
                                        $select_q="SELECT CONCAT(`f_name`,' ',`l_name`) as `name` from `employees` where `id`= '$task[emp_id]'";
                                        $result=mysqli_query($conn,$select_q);
                                        if ($result) {
                                            $employee = mysqli_fetch_assoc($result);
                                            if ($employee) {
                                                $employee_name = $employee['name'];
                                            } else {
                                                $employee_name = 'Not Assigned';
                                            }
                                        } else {
                                            $employee_name = 'Not Assigned';
                                        }
                                        $currentdate=date('Y-m-d');

                                        echo '
                                    <tr>
                                    <td>' . $task['task_id'] . '</td>
                                    <td>
                                        <h6 class="mb-0">' . $task['title'] . '</h6>
                                        <span>' . $task['description'] . '</span>
                                    </td>
                                    <td>
                                    <h6 class="mb-0">' . $employee_name . '</h6>

                                       </td>';
                                        if($task['end_date']< $currentdate){
                                            echo'
                                            <td>
                                                <div class="text-info">Start: ' . $task['start_date'] . '</div>
                                                <div class="text-pink">End: ' . $task['end_date'] . '</div>
                                            </td>';
                                        }else{
                                      echo'      <td>
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
                                        
                                        <a href="../backend/taskboard.php?del_id='.$task['task_id'].'"><i class="fa fa-trash"></i></a>
                                        <a href="edit_task.php?id_edit='.$task['task_id'].'"><i class="fa fa-edit"></i></a>
                                      
                                        </td>
                                        </tr> ';
                                    }


                                    ?>
                                    <tbody>
                                        <!-- <tr>
                                        <td>03</td>
                                        <td>
                                            <h6 class="mb-0">Feed Details on Dribbble</h6>
                                            <span>The point of using Lorem Ipsum is that...</span>
                                        </td>
                                        <td>
                                            <ul class="list-unstyled team-info mb-0 w150">
                                                <li><img src="../assets/images/xs/avatar1.jpg" data-toggle="tooltip" data-placement="top" title="Avatar" alt="Avatar"></li>
                                                <li><img src="../assets/images/xs/avatar2.jpg" data-toggle="tooltip" data-placement="top" title="Avatar" alt="Avatar"></li>
                                                <li><img src="../assets/images/xs/avatar5.jpg" data-toggle="tooltip" data-placement="top" title="Avatar" alt="Avatar"></li>
                                            </ul>
                                        </td>
                                        <td>
                                            <div class="text-info">Start: 3 Jun 2019</div>
                                            <div class="text-pink">End: 15 Jun 2019</div>
                                        </td>
                                        <td>
                                            <span class="tag tag-orange">In progress</span>
                                        </td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="float-left"><strong>35%</strong></div>
                                                <div class="float-right"><small class="text-muted">Progress</small></div>
                                            </div>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-azure" role="progressbar" style="width: 35%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr> -->
                                </table>
                            </div>
                            </div>
                            </div>
                        </div>
                         <!-- Modal
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> -->

                        <!-- This is scrum type  -->
                        <div class="tab-pane" id="TaskBoard-Scrum">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-12">
                                    <div class="card planned_task">
                                        <div class="card-header">
                                            <h3 class="card-title">Planned</h3>
                                            <div class="card-options">
                                                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                                <div class="item-action dropdown ml-2">
                                                    <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-folder"></i> Move to</a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-edit"></i> Rename</a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-trash"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- This is a list of planned task -->

                                        <div class="card-body">

                                            <div class="dd" data-plugin="nestable">
                                                <ol class="dd-list">

                                                    <?php
                                                    $plannedTasks = planned_tasks();
                                                    foreach ($plannedTasks as $task) { 
                                                        $select_q="SELECT CONCAT(`f_name`,' ',`l_name`) as `name` from `employees` where `id`= '$task[emp_id]'";
                                        $result=mysqli_query($conn,$select_q);
                                        if ($result) {
                                            $employee = mysqli_fetch_assoc($result);
                                            if ($employee) {
                                                $employee_name = $employee['name'];
                                            } else {
                                                $employee_name = 'Not Assigned';
                                            }
                                        } else {
                                            $employee_name = 'Not Assigned';
                                        }
?>
                                                        <li class="dd-item" data-id="<?php echo $task['task_id']; ?>">
                                                            <div class="dd-handle">
                                                                <h6><?php echo htmlspecialchars($task['title']); ?></h6>
                                                                <span class="time"><span class="text-primary">Start: <?php echo $task['start_date']; ?></span> to <span class="text-danger">Complete: <?php echo $task['end_date']; ?></span></span>
                                                                <p>Assigned to: <span class="text-primary"> <?php echo $employee_name?></span></p>
                                                                <p><?php echo ($task['description']); ?></p>


                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                </ol>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- List of Inprogress Tasks -->
                                <div class="col-lg-4 col-md-12">
                                    <div class="card progress_task">
                                        <div class="card-header">
                                            <h3 class="card-title">In progress</h3>
                                            <div class="card-options">
                                                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                                <div class="item-action dropdown ml-2">
                                                    <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-folder"></i> Move to</a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-edit"></i> Rename</a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-trash"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="dd" data-plugin="nestable">
                                                <ol class="dd-list">
                                                    <?php
                                                    $in_progessTasks = in_prograss_tasks();
                                                    foreach ($in_progessTasks as $task) { 
                                                        $select_q="SELECT CONCAT(`f_name`,' ',`l_name`) as `name` from `employees` where `id`= '$task[emp_id]'";
                                                        $result=mysqli_query($conn,$select_q);
                                                        if ($result) {
                                                            $employee = mysqli_fetch_assoc($result);
                                                            if ($employee) {
                                                                $employee_name = $employee['name'];
                                                            } else {
                                                                $employee_name = 'Not Assigned';
                                                            }
                                                        } else {
                                                            $employee_name = 'Not Assigned';
                                                        }
                
                                                        ?>
                                                        <li class="dd-item" data-id="<?php echo $task['task_id']; ?>">
                                                            <div class="dd-handle">
                                                                <h6><?php echo htmlspecialchars($task['title']); ?></h6>
                                                                <span class="time"><span class="text-primary">Start: <?php echo $task['start_date']; ?></span> to <span class="text-danger">Complete: <?php echo $task['end_date']; ?></span></span>
                                                                <p>Assigned to: <span class="text-primary"> <?php echo $employee_name?></span></p>
                                                                <p><?php echo ($task['description']); ?></p>

                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- List of Completed Tasks -->
                                <div class="col-lg-4 col-md-12">
                                    <div class="card completed_task">
                                        <div class="card-header">
                                            <h3 class="card-title">Completed</h3>
                                            <div class="card-options">
                                                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                                <div class="item-action dropdown ml-2">
                                                    <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-folder"></i> Move to</a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-edit"></i> Rename</a>
                                                        <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-trash"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="dd" data-plugin="nestable">
                                                <ol class="dd-list">
                                                    <?php
                                                    $completedTasks = completed_tasks();
                                                    foreach ($completedTasks as $task) { 
                                                        $select_q="SELECT CONCAT(`f_name`,' ',`l_name`) as `name` from `employees` where `id`= '$task[emp_id]'";
                                                        $result=mysqli_query($conn,$select_q);
                                                        if ($result) {
                                                            $employee = mysqli_fetch_assoc($result);
                                                            if ($employee) {
                                                                $employee_name = $employee['name'];
                                                            } else {
                                                                $employee_name = 'Not Assigned';
                                                            }
                                                        } else {
                                                            $employee_name = 'Not Assigned';
                                                        }
                
                                                        
                                                        ?>
                                                        <li class="dd-item" data-id="<?php echo $task['task_id']; ?>">
                                                            <div class="dd-handle">
                                                                <h6><?php echo htmlspecialchars($task['title']); ?></h6>
                                                                <span class="time"><span class="text-primary">Start: <?php echo $task['start_date']; ?></span> to <span class="text-danger">Complete: <?php echo $task['end_date']; ?></span></span>
                                                                <p>Assigned to: <span class="text-primary"> <?php echo $employee_name?></span></p>
                                                                <p><?php echo ($task['description']); ?></p>

                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <!-- Add Task -->
                        <div class="tab-pane" id="TaskBoard-add">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Add Task</h3>
                                    <div class="card-options ">
                                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                    </div>
                                </div>
                                <form class="card-body" action="../backend/taskboard.php" method="post">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Job title <span class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" name="task_title">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Assign to<span class="text-danger">*</span></label>
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
                                    <div class="form-group row">
                <label class="col-md-3 col-form-label">Priority <span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <select class="form-control show-tick" name="priority">
                        <option value="">Select</option>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Assigned By <span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <select class="form-control show-tick" name="assigned_by">
                        <option>Select</option>
                        <?php 
                        $sql="SELECT `id`, concat(`f_name`,' ',`l_name`) as `name` FROM `employees`"; // Modify this query as needed to get the list of possible assigners
                        $res=mysqli_query($conn,$sql);
                        if(mysqli_num_rows($res)){
                            while($row=mysqli_fetch_assoc($res)){
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
                <label class="col-md-3 col-form-label">Range <span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <div class="input-daterange input-group" data-provide="datepicker">
                        <input type="text" class="form-control" name="start_date">
                        <span class="input-group-addon"> to </span>
                        <input type="text" class="form-control" name="end_date">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Status<span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <select class="form-control show-tick" name="status">
                        <option value="">Select</option>
                        <option value="Planned">Planned</option>
                        <option value="In progress">In progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>
            </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Description <span class="text-danger">*</span></label>
                                        <div class="col-md-7">
                                            <textarea rows="6" class="form-control no-resize" placeholder="Please type what you want..." name="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label"></label>
                                        <div class="col-md-7">
                                            <button type="submit" class="btn btn-primary" name="submit_task">Submit</button>
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