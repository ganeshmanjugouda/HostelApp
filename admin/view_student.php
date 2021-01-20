<?php
include_once './session.php';
include '../db/db.class.php';
include_once '../include/header.php';
?>


    <body class="login" style="background-image: url('');">
   
    <div id="student_table"></div>
   
    <!--update student details-->
    <div class="modal fade" id="show_student">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Update student Info</h3>
                </div>
                <div class="modal-body">
                    <label id="up_message" style="text-align:center;line-height:150%;font-size:.85em;" class="badge badge-success"></label>
                    <form>
                        <input type="hidden" class="form-control my-3"  placeholder="student id" id="up_student_id">
                        <input type="text" class="form-control my-3" placeholder="usn" id="up_student_usn">
                        <input type="text" class="form-control my-3" placeholder="Name" id="up_student_name">
                        <input type="text" class="form-control my-3" placeholder="Contact" id="up_student_contact">
                        <input type="text" class="form-control my-3" placeholder="Email" id="up_student_email">
                        <input type="text" class="form-control my-3" placeholder="Address" id="up_student_address">
                        <input type="text" class="form-control my-3" placeholder="Guardian contact no" id="up_student_careno">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="up_student_info">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="student_close">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--delete student info modal-->
     <div class="modal fade" id="delete_student">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Delete Student Information</h3>
                </div>
                <div class="modal-body">
                    <label id="delete_message" class="badge badge-success"></label>
                    <label>Do you want to delete the record?</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="delete_student_info">Delete</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="student_del_close">Close</button>
                </div>
            </div>
        </div>
    </div>
    
</body>



<?php include_once '../include/footer.php'; ?>


    
