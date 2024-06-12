<?php
include '../backend/contact.php';

if (isset($_POST['contact_id'])) {
    $contact_id = $_POST['contact_id'];
    $contact = get_contact_by_id($contact_id); // Create this function to fetch a single contact by ID
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<title>:: Ericsson:: Cantact</title>
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

<!-- Contact Edit Modal -->
<div class="modal fade show" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Edit Contact</h5>
                <button type="button" class="close" aria-label="Close" onclick="window.history.back();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../backend/contact.php?edit_id=<?php echo $contact['contact_id']; ?>" method="post">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Name" name="name" value="<?php echo $contact['name']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Number" name="phone" value="<?php echo $contact['phone']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Enter Email" name="email" value="<?php echo $contact['email']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <textarea type="text" class="form-control" rows="4" placeholder="Enter your Address" name="address"><?php echo $contact['address']; ?></textarea>
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
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('contactModal').style.display = 'block';
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
