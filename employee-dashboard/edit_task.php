<?php
include '../backend/taskboard.php';

if (isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];
    $task = get_task_by_id($task_id); // Create this function to fetch a single task by ID
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>Task</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="../assets/plugins/dropify/css/dropify.min.css">

<!-- Core css -->
<link rel="stylesheet" href="../assets/css/style.min.css"/>
</head>
<body>

<!-- Add your navigation and other sections here -->

<!-- task Edit Modal -->
<div class="modal fade show" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taskModalLabel">Edit task</h5>
                <button type="button" class="close" aria-label="Close" onclick="window.history.back();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../backend/taskboard.php?edit_id=<?php echo $task['task_id']; ?>" method="post">
                    <div class="row clearfix">
                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label">Status<span class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <select class="form-control show-tick" name="status" >
                                                <option>Select</option>
                                                <option  <?php if ($task['status'] == 'Planned') {
                                                            echo 'selected';
                                                        } ?>>Planned</option>
                                                <option  <?php if ($task['status'] == 'In progress') {
                                                            echo 'selected';
                                                        } ?>>In progress</option>
                                                <option <?php if ($task['status'] == 'Completed') {
                                                            echo 'selected';
                                                        } ?>>Completed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
    
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('taskModal').style.display = 'block';
    });
</script>
<!-- Start Main project js, jQuery, Bootstrap -->
<script src="../assets/bundles/lib.vendor.bundle.js"></script>

<!-- Start Plugin Js -->
<script src="../assets/bundles/sweetalert.bundle.js"></script>
<script src="../assets/plugins/dropify/js/dropify.min.js"></script>

<!-- Start project main js  and page js -->
<script src="../assets/js/core.js"></script>
<script src="assets/js/page/dialogs.js"></script>
</body>
</html>
