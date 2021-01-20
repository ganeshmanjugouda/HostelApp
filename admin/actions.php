<?php

require_once './session.php';
require_once '../db/db.class.php';

$db = new DB();

$message = array();

try {

    if (isset($_POST['command'])) {
    
    $command = $_POST['command'];


    if ('add_security' == $command) {
        $name = $_POST['security_name'];
        $contactno = $_POST['contact_no'];
        $mailid = $_POST['mail_id'];
        $pass = $_POST['password'];
        $address = $_POST['address'];


        $insert_security = "INSERT INTO security (se_name, se_contactno, se_email, se_password, se_address, se_is_enable, is_delete)"
                . " VALUES('$name', '$contactno', '$mailid', '$pass', '$address', '0', '0')";

        $db->executeInsertAndGetId($insert_security);
        $_SESSION['success'] = ' Security Added Successfully';
        header("location: add_security.php");
    }
    
    elseif ('add_event'== $command) { 
    $event_title = $_POST['event_title'];
    $event_date = $_POST['event_date'];
    $event_description = $_POST['description'];
    
    $insert_event = "INSERT INTO event (e_event_title, e_date, e_description, is_completed  )"
            . " VALUES('$event_title','$event_date','$event_description', '0')";
    
    $db ->executeInsertAndGetId($insert_event);
    $_SESSION['success'] = 'Event added successfully';
    header("location:add_event.php");
    }
    
} else {
    throw new Exception("Invalid HTTP request ");
    }
} catch (Exception $ex) {

}


function student_list_upload()
{
    if(!empty($_FILES["excel_file"]))  
 {  
    $connect = mysqli_connect("localhost", "root", "", "hostel"); 
    $file_array = explode(".", $_FILES["excel_file"]["name"]);  
    if($file_array[1] == "xlsx")  
    {  
         include("../Classes/PHPExcel/IOFactory.php");  
         $output = '';  
         $output .= "  
         <label class='badge badge-success middle'>Data Inserted</label>  
              <table class='table table-bordered'>
                   <tr>  
                        <th>S.NO</th>  
                        <th>USN</th>  
                        <th>Student Name</th>  
                        <th>Contact No</th>  
                        <th>Email Id</th>  
                        <th>Address</th>  
                        <th>Guardian Contact no</th>  
                   </tr>  
                   ";  
         $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);  
         foreach($object->getWorksheetIterator() as $worksheet)  
         {  
              $highestRow = $worksheet->getHighestRow();  
              for($row=2; $row<=$highestRow; $row++)  
              {  
                   $id = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
                   $usn = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
                   $name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
                   $contact_no = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());  
                   $email_id = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());  
                   $address = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());  
                   $care_no = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
                   $query= " 
                   INSERT INTO student  
                   (s_id, s_usn, s_name, s_contactno, s_email, s_address, s_care_no, is_delete)   
                   VALUES ('".$id."', '".$usn."', '".$name."', '".$contact_no."', '".$email_id."', '".$address."', '".$care_no."', '0')  
                   ";
                   mysqli_query($connect, $query);
//                   $db->executeInsert($query);  
                   $output .= '  
                   <tr>  
                        <td>'.$id.'</td>  
                        <td>'.$usn.'</td>  
                        <td>'.$name.'</td>  
                        <td>'.$contact_no.'</td>  
                        <td>'.$email_id.'</td>  
                        <td>'.$address.'</td>  
                        <td>'.$care_no.'</td>  
                   </tr>  
                   ';  
              }  
         }  
         $output .= '</table>';  
         echo $output;  
    }  
    else  
    {  
         echo '<label class="text-danger">Invalid File</label>';  
    }  
 }  
}


function display_student()
{
    global $db;
    $value = "";
    $value = '<table class="table table-responsive-sm text-center table-striped table-bordered bg-white" >
    <thead class="thead-dark">
        <tr class="font-weight-bold">
            <th>Id</th>
            <th>USN</th>
            <th>Student Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
            <th>Guardian Contact no</th>
            <th colspan = "2">Action</th>
        </tr>';
    $student = "SELECT * FROM student where is_delete ='0'";
    $studentList = $db->executeSelect($student);
    foreach ($studentList as $row)
    {
        $value.= '<tr>
            <td>'.$row['s_id'].'</td>
            <td>'.$row['s_usn'].'</td>
            <td>'.$row['s_name'].'</td>
            <td>'.$row['s_contactno'].'</td>
            <td>'.$row['s_email'].'</td>
            <td>'.$row['s_address'].'</td>
            <td>'.$row['s_care_no'].'</td>
            <td>
                <button class="btn btn-primary" id="update_student" student-id='.$row['s_id'].'><span class="fa fa-edit"></span></button>
            </td>
            <td>
                <button class="btn btn-danger" id="del_student" data-student-id='.$row['s_id'].'><span class="fa fa-trash"></span></button>
            </td>
        </tr>';
    }
    $value.='</table>';
    echo json_encode(['status'=>'success','html'=>$value]);
}

//loading student info to update
function load_student_info()
{
    global $db;
    $student_id = $_POST['student_id'];
    $query = "select * from student where s_id = '$student_id'";
    $st_id = $db->executeSelect($query);
    foreach ($st_id as $row)
    {
        $student_data[0] = $row['s_id'];
        $student_data[1] = $row['s_usn'];
        $student_data[2] = $row['s_name'];
        $student_data[3] = $row['s_contactno'];
        $student_data[4] = $row['s_email'];
        $student_data[5] = $row['s_address'];
        $student_data[6] = $row['s_care_no'];
    }
    echo json_encode($student_data);
}


//updating student info
function update_student()
{
    global $db;
    $up_student_id = $_POST['up_student_id'];
    $up_student_usn = $_POST['up_student_usn'];
    $up_student_name = $_POST['up_student_name'];
    $up_student_contact = $_POST['up_student_contact'];
    $up_student_email = $_POST['up_student_email'];
    $up_student_address = $_POST['up_student_address'];
    $up_student_careno = $_POST['up_student_careno'];
    
    $query = "update student set s_id = '$up_student_id', s_usn ='$up_student_usn', s_name = '$up_student_name', "
            . "s_contactno ='$up_student_contact', s_email = '$up_student_email', s_address = '$up_student_address', "
            . "s_care_no = '$up_student_careno' where s_id = '$up_student_id'" ;
    
    $result = $db->executeUpdate($query);
    if($result)
    {
        echo 'Update Success';
    }
    else 
    {
        echo 'Update Fail';
    }
}

//deleting donar record
function delete_student_info()
{
    global $db;
    
    $del_student_id = $_POST['del_student_id'];
    $query = "update student set is_delete = '1' where s_id = '$del_student_id'";
    $result = $db->executeUpdate($query);
    
    if($result)
    {
        echo 'Your record has been deleted';
    }
    else 
    {
        echo 'Record not deleted'; 
    }
}


function display_security()
{
   global $db;
    $value = "";
    $value = '<table class="table table-responsive-sm text-center table-striped table-bordered bg-white" >
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Security Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Password</th>
            <th>Address</th>
            <th colspan = "3">Action</th>
        </tr>';
    $student = "SELECT * FROM security where is_delete = '0'";
    $studentList = $db->executeSelect($student);
    foreach ($studentList as $row)
    {
        $result = $row['se_is_enable'];
        if($result == 1) {
        $value.= '<tr>
            <td>'.$row['se_id'].'</td>
            <td>'.$row['se_name'].'</td>
            <td>'.$row['se_contactno'].'</td>
            <td>'.$row['se_email'].'</td>
            <td>'.$row['se_password'].'</td>
            <td>'.$row['se_address'].'</td>
            <td>
                <button class="btn btn-primary" id="update_security" security-id='.$row['se_id'].'><span class="fa fa-edit"></span></button>
            </td>
            <td>
                <button class="btn btn-danger" id="del_security" data-security-id ='.$row['se_id'].'><span class="fa fa-trash"></span></button>
            </td>
            <td>
                <button class="btn btn-danger" id="disable_security" disable-id ='.$row['se_id'].'>DISABLE</button>
            </td>
           
        </tr>'; }
        else {
            $value.= '<tr>
            <td>'.$row['se_id'].'</td>
            <td>'.$row['se_name'].'</td>
            <td>'.$row['se_contactno'].'</td>
            <td>'.$row['se_email'].'</td>
            <td>'.$row['se_password'].'</td>
            <td>'.$row['se_address'].'</td>
            <td>
                <button class="btn btn-primary" id="update_security" security-id='.$row['se_id'].'><span class="fa fa-edit"></span></button>
            </td>
            <td>
                <button class="btn btn-danger" id="del_security" data-security-id ='.$row['se_id'].'><span class="fa fa-trash"></span></button>
            </td>
            <td>
                <button class="btn btn-success" id="enable_security" enable-id ='.$row['se_id'].'>ENABLE</button>
            </td>
           
        </tr>';
        }
    }
    $value.='</table>';
    echo json_encode(['status'=>'success','html'=>$value]);
}

//loading security info to update
function load_security_info()
{
    global $db;
    $security_id = $_POST['security_id'];
    $query = "select * from security where se_id = '$security_id'";
    $se_id = $db->executeSelect($query);
    foreach ($se_id as $row)
    {
        $security_data[0] = $row['se_id'];
        $security_data[1] = $row['se_name'];
        $security_data[2] = $row['se_contactno'];
        $security_data[3] = $row['se_email'];
        $security_data[4] = $row['se_password'];
        $security_data[5] = $row['se_address'];
    }
    echo json_encode($security_data);
}

//updating security info
function update_security()
{
    global $db;
    $up_security_id = $_POST['up_security_id'];
    $up_security_name = $_POST['up_security_name'];
    $up_security_contact = $_POST['up_security_contact'];
    $up_security_email = $_POST['up_security_email'];
    $up_security_password = $_POST['up_security_password'];
    $up_security_address = $_POST['up_security_address'];
    
    $query = "update security set se_id = '$up_security_id', se_name = '$up_security_name', "
            . "se_contactno ='$up_security_contact', se_email = '$up_security_email', se_password = '$up_security_password' ,"
            . "se_address = '$up_security_address' where se_id = '$up_security_id'" ;
    
    $result = $db->executeUpdate($query);
    if($result)
    {
        echo 'Update Success';
    }
    else 
    {
        echo 'Update Fail';
    }
}

//deleting security record
function delete_security_info()
{
    global $db;
    
    $del_security_id = $_POST['delete_security_id'];
    $query = "update security set is_delete = '1' where se_id = '$del_security_id'";
    $result = $db->executeUpdate($query);
    
    if($result)
    {
        echo 'Your record has been deleted';
    }
    else 
    {
        echo 'Record not deleted'; 
    }
}

//disable security info
function disable_security()
{
    global $db;
    $disable_id = $_POST['disable_id'];
    
    $query = "update security set se_is_enable = '0' where se_id = '$disable_id'" ;
    
    $result = $db->executeUpdate($query);
    if($result)
    {
        echo 'Security Disabled';
    }
    else 
    {
        echo 'Update Fail';
    }
}

//enable security info
function enable_security()
{
    global $db;
    $enable_id = $_POST['enable_id'];
    
    $query = "update security set se_is_enable = '1' where se_id = '$enable_id'" ;
    
    $result = $db->executeUpdate($query);
    if($result)
    {
        echo 'Security Enabled';
    }
    else 
    {
        echo 'Update Fail';
    }
}


function display_outpass()
{
    global $db;
    $value = "";
    $value = '<table class="table table-responsive-sm text-center table-striped table-bordered bg-white" >
    <thead class="thead-dark">
        <tr class="font-weight-bold">
            <th>Id</th>
            <th>Student Id</th>
            <th>Student Name</th>
            <th>Departure Date</th>
            <th>Departure Time</th>
            <th>Arrival Date</th>
            <th>Arrival Time</th>
            <th>Reason</th>
            <th>Action</th>
        </tr>';
    $outpass = "SELECT * FROM outpass, student where o_student_id = s_id";
    $outpassList = $db->executeSelect($outpass);
    foreach ($outpassList as $row)
    { 
        $result = $row['is_allowed'];
        if($result == 0)
        {
            $value.= '<tr>
                <td>'.$row['o_id'].'</td>
                <td>'.$row['o_student_id'].'</td>
                <td>'.$row['s_name'].'</td>
                <td>'.$row['o_departure_date'].'</td>
                <td>'.$row['o_departure_time'].'</td>
                <td>'.$row['o_arrival_date'].'</td>
                <td>'.$row['o_arrival_time'].'</td>
                <td>'.$row['o_reason'].'</td>
                <td>
                    <button class="btn btn-success" id="allow_out" out-id='.$row['o_id'].'>Allow</button>
                </td>
            </tr>';
        }
    else
    {
        $value.= '<tr>
                <td>'.$row['o_id'].'</td>
                <td>'.$row['o_student_id'].'</td>
                <td>'.$row['s_name'].'</td>
                <td>'.$row['o_departure_date'].'</td>
                <td>'.$row['o_departure_time'].'</td>
                <td>'.$row['o_arrival_date'].'</td>
                <td>'.$row['o_arrival_time'].'</td>
                <td>'.$row['o_reason'].'</td>
                <td>
                    <button class="btn btn-danger" id="cancel_out" cancel-out-id='.$row['o_id'].'>Cancel</button>
                </td>
            </tr>';
    }
    $value.='</table>';
    echo json_encode(['status'=>'success','html'=>$value]);
    }
}


function allow_out()
{
    global $db;
    $out_id = $_POST['out_id'];
    
    $query = "update outpass set is_allowed = '1' where o_id = '$out_id'" ;
    
    $result = $db->executeUpdate($query);
    if($result)
    {
        echo '<p style="color: green" class="font-weight-bold">Permission Given</p>';
    }
    else 
    {
        echo 'Update Fail';
    }
}

function cancel_out()
{
    global $db;
    $cancel_out_id = $_POST['cancel_out_id'];
    
    $query = "update outpass set is_allowed = '0' where o_id = '$cancel_out_id'" ;
    
    $result = $db->executeUpdate($query);
    if($result)
    {
        echo '<p style="color: red" class="font-weight-bold">Permission Not Given</p>';
    }
    else 
    {
        echo 'Update Fail';
    }
}

function display_complaint()
{
    global $db;
    $value = "";
    $value = '<table class="table table-responsive-sm text-center table-striped table-bordered bg-white" >
    <thead class="thead-dark">
        <tr class="font-weight-bold">
            <th>Id</th>
            <th>Student Id</th>
            <th>Student Name</th>
            <th>Complaint Date</th>
            <th>Complaint Description</th>
            <th>Action</th>
        </tr>';
    $complaint = "SELECT * FROM complaint, student where c_student_id = s_id";
    $complaintList = $db->executeSelect($complaint);
    foreach ($complaintList as $row)
    { 
        $result = $row['is_solved'];
        if($result == 0)
        {
            $value.= '<tr>
                <td>'.$row['c_id'].'</td>
                <td>'.$row['c_student_id'].'</td>
                <td>'.$row['s_name'].'</td>
                <td>'.$row['c_date'].'</td>
                <td>'.$row['c_description'].'</td>
                <td>
                    <button class="btn btn-success" id="c_solve" solve-id='.$row['c_id'].'>solved</button>
                </td>
            </tr>';
        }
    else
    {
        $value.= '<tr>
                <td>'.$row['c_id'].'</td>
                <td>'.$row['c_student_id'].'</td>
                <td>'.$row['s_name'].'</td>
                <td>'.$row['c_date'].'</td>
                <td>'.$row['c_description'].'</td>
                <td>
                    <label style="color: green">solved</label>
                </td>
            </tr>';
    }
    $value.='</table>';
    echo json_encode(['status'=>'success','html'=>$value]);
    }
}


function c_solved()
{
    global $db;
    $solve_id = $_POST['solve_id'];
    
    $query = "update complaint set is_solved = '1' where c_id = '$solve_id'" ;
    
    $result = $db->executeUpdate($query);
    if($result)
    {
        echo '<p style="color: green" class="font-weight-bold">Problem Solved</p>';
    }
    else 
    {
        echo 'Update Fail';
    }
}


function display_event()
{
    global $db;
    $value = "";
    $value = '<table class="table table-responsive-sm text-center table-striped table-bordered bg-white" >
    <thead class="thead-dark">
        <tr class="font-weight-bold">
            <th>Id</th>
            <th>Event Title</th>
            <th>Event Date and Time</th>
            <th>Event Description</th>
            <th>Action</th>
        </tr>';
    $event = "SELECT * FROM event ";
    $eventList = $db->executeSelect($event);
    foreach ($eventList as $row)
    { 
        $result = $row['is_completed'];
        if($result == 0)
        {
            $value.= '<tr>
                <td>'.$row['e_id'].'</td>
                <td>'.$row['e_event_title'].'</td>
                <td>'.$row['e_date'].'</td>
                <td>'.$row['e_description'].'</td>
                <td>
                    <button class="btn btn-primary" id="up_event" up-event-id='.$row['e_id'].'><span class="fa fa-edit"></span></button>
                    <button class="btn btn-success" id="event_id" e-id='.$row['e_id'].'>Completed</button>
                </td>
            </tr>';
        }
         else {
             $value.= '<tr>
                        <td>'.$row['e_id'].'</td>
                        <td>'.$row['e_event_title'].'</td>
                        <td>'.$row['e_date'].'</td>
                        <td>'.$row['e_description'].'</td>
                        <td>
                            <label style="color: green">Completed</label>
                        </td>
                    </tr>';
         }
    $value.= '</table>';
    echo json_encode(['status'=>'success','html'=>$value]);
    }
}

function load_event_info()
{
    global $db;
    $event_id = $_POST['e_id'];
    $query = "select * from event where e_id = '$event_id'";
    $ev_id = $db->executeSelect($query);
    foreach ($ev_id as $row)
    {
        $event_data[0] = $row['e_id'];
        $event_data[1] = $row['e_event_title'];
        $event_data[2] = $row['e_date'];
        $event_data[3] = $row['e_description'];
    }
    echo json_encode($event_data);
}

function update_event()
{
    global $db;
    $event_id = $_POST['event_id'];
    $event_title = $_POST['event_title'];
    $event_date = $_POST['event_date'];
    $description = $_POST['description'];
    
    $query = "update event set e_id = '$event_id', e_event_title ='$event_title', e_date = '$event_date',e_description ='$description'";
    
    $result = $db->executeUpdate($query);
    if($result)
    {
        echo 'Update Success';
    }
    else 
    {
        echo 'Update Fail';
    }
}

function event_complete()
{
    global $db;
    $e_id = $_POST['e_id'];
    
    $query = "update event set is_completed = '1' where e_id = '$e_id'" ;
    
    $result = $db->executeUpdate($query);
    if($result)
    {
        echo '<p style="color: green" class="font-weight-bold">Event Completed</p>';
    }
    else 
    {
        echo 'Update Fail';
    }
}