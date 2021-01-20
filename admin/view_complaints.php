<?php
include_once './session.php';
include '../db/db.class.php';
include_once '../include/header.php';
?>

 <div id="complaint_table"></div>
 
 
 <div class="modal fade" id="info">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-center form-control bg-light" id="complaint"></label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal" id="complaint_close">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
<?php include_once '../include/footer.php'; ?>