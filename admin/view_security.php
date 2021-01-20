<?php
include_once './session.php';
include '../db/db.class.php';
include_once '../include/header.php';
?>

<body class="login" style="background-image: url('');">
    <div id="security_table"></div>
    
    <!--update student details-->
    <div class="modal fade" id="show_security">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Update Security Info</h3>
                </div>
                <div class="modal-body">
                    <label id="up_message" style="text-align:center;line-height:150%;font-size:.85em;" class="badge badge-success"></label>
                    <form>
                        <input type="hidden" class="form-control my-3"  placeholder="security id" id="up_security_id">
                        <input type="text" class="form-control my-3" placeholder="Name" id="up_security_name">
                        <input type="text" class="form-control my-3" placeholder="Contact" id="up_security_contact">
                        <input type="text" class="form-control my-3" placeholder="Email" id="up_security_email">
                        <input type="text" class="form-control my-3" placeholder="Password" id="up_security_password">
                        <input type="text" class="form-control my-3" placeholder="Address" id="up_security_address">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="up_security_info">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="security_close">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--delete student info modal-->
     <div class="modal fade" id="delete_security">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Delete Security Information</h3>
                </div>
                <div class="modal-body">
                    <label id="delete_message" class="badge badge-success"></label>
                    <label>Do you want to delete the record?</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="delete_security_info">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="security_del_close">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="info">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-control badge-danger text-center" id="disabled"></label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal" id="disable_close">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
         
    <div class="modal fade" id="enabl">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body ">
                    <div class="form-group">
                        <label class="form-control badge-success  text-center" id="enabled"></label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal" id="enabled_close">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
    
</body>

<?php include_once '../include/footer.php'; ?>



