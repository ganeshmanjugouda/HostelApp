<?php
include_once './session.php';
include '../db/db.class.php';
include_once '../include/header.php';
?>

<div id="events_table"></div>
 
 <div class="modal fade" id="show_event">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Update student Info</h3>
                </div>
                <div class="modal-body">
                    <label id="up_message" style="text-align:center;line-height:150%;font-size:.85em;" class="badge badge-success"></label>
                    <form>
                        <input type="hidden" class="form-control my-3"  placeholder="Event id" id="event_id">
                        <input type="text" class="form-control my-3" placeholder="Event Title" id="event_title">
                        <input type="datetime-local" class="form-control my-3" placeholder="Event Date" id="event_date">
                        <input type="text" class="form-control my-3" placeholder="Description" id="description">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="up_event_info">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="event_close">Close</button>
                </div>
            </div>
        </div>
    </div>
    
 
 <div class="modal fade" id="info">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-center form-control bg-light" id="event"></label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal" id="ev_close">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
<?php include_once '../include/footer.php'; ?>