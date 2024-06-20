<!-- Modal -->
<div class="modal fade" id="leaveModal" tabindex="-1" aria-labelledby="leaveModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="leaveModalLabel">Apply Leave </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                <form action="../backend/employee/leave.php" method="post">

                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Leave Reason<span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" Required name="reason">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label"> From <span class="text-danger">*</span></label>
                                    <div class="col-md-7">
                                        <input type="date" Required data-date-autoclose="true" class="form-control" placeholder=""
                                        name="start_date">
                                    </div>

                                    <label class="col-md-3  col-form-label"> To <span class="text-danger">*</span></label>
                                    <div class="col-md-7 my-2">
                                        <input type="date" Required data-date-autoclose="true" class="form-control" placeholder=""
                                        name="end_date">
                                    </div>

                                </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit_leave">Save</button>
                    </div>
                </form>

                </div>
            </div>
        </div>


    </div>    
</div>
