$(document).ready(function()
{
   upload_myfile();
   
   view_student();
   get_student_info();
   update_student_info();
   delete_student_info();
   view_security();
   get_security_info();
   update_security_info();
   delete_security_info();
   disable_security();
   enable_security();
   view_outpass();
   allow_out();
   cancel_out();
   view_complaints();
   c_solve();
   view_events();
   get_event_info();
   event_complete();
});
 
function upload_myfile()
{
  $('#excel_file').change(function(){  
           $('#export_excel').submit();  
      });  
      $('#export_excel').on('submit', function(event){  
           event.preventDefault();  
           $.ajax({  
                url:"upload.php",
                method:"POST",  
                data:new FormData(this),  
                contentType:false,  
                processData:false,  
                success:function(data){  
                     $('#result').html(data);  
                     $('#excel_file').val('');
                     view_student();
                }  
           });  
      });
}

function view_student()
{
    $.ajax({
        url:'view_student_info.php',
        method:'post',
        success: function(data)
        {
            data = $.parseJSON(data);
            if(data.status == 'success')
            {
                $('#student_table').html(data.html);
            }
        }
    })
}

//load student info into modal
function get_student_info()
{
    $(document).on('click','#update_student',function()
    {
        var s_id = $(this).attr('student-id');
        $.ajax({
            url: 'load_student.php',
            method: 'post',
            data:{student_id: s_id},
            dataType: 'JSON',
            success: function(data)
            {
                $('#up_student_id').val(data[0]);
                $('#up_student_usn').val(data[1]);
                $('#up_student_name').val(data[2]);
                $('#up_student_contact').val(data[3]);
                $('#up_student_email').val(data[4]);
                $('#up_student_address').val(data[5]);
                $('#up_student_careno').val(data[6]);
                $('#show_student').modal('show');
                
            }
        })
    })
};

//load and update doctor info
function update_student_info()
{
    $(document).on('click','#up_student_info', function()
    {
        var up_student_id = $('#up_student_id').val();
        var up_student_usn= $('#up_student_usn').val();
        var up_student_name = $('#up_student_name').val();
        var up_student_contact = $('#up_student_contact').val()
        var up_student_email = $('#up_student_email').val();
        var up_student_address = $('#up_student_address').val();
        var up_student_careno = $('#up_student_careno').val();
        
        if(up_student_usn == ""|| up_student_name == ""|| up_student_contact == ""|| up_student_email == ""|| up_student_address == "" || up_student_careno == "")
        {
            $('#up_message').html('Please fill the blank');
            $('#show_student').modal('show');
        }
        else
        {
         $.ajax({
             url: 'update_student.php',
             method: 'post',
             data:{up_student_id: up_student_id,up_student_usn:up_student_usn, up_student_name: up_student_name, up_student_contact: up_student_contact, 
                 up_student_email:up_student_email, up_student_address:up_student_address, up_student_careno: up_student_careno},
             success: function(data)
             {
                $('#up_message').html(data);
                $('#show_student').modal('show');
                $('form').trigger('reset');
                view_student();
             }
         })   
        }
    })
    $(document).on('click','#student_close', function(){
        $('form').trigger('reset');
        $('#up_message').html('');
    })
}

//deleting doctor info
function delete_student_info()
{
    $(document).on('click','#del_student', function()
    {
        var delete_student_id = $(this).attr('data-student-id');
        $('#delete_student').modal('show');
        
        $(document).on('click','#delete_student_info', function()
        {
            $.ajax({
            url:'delete_student.php',
            method:'post',
            data:{del_student_id:delete_student_id},
            success: function(data)
            {
                $('#delete_message').html(data);
                view_student();
            }
        })
        })
        $(document).on('click','#student_del_close', function(){
        $('form').trigger('reset');
        $('#delete_message').html('');
        
    })
    })
}

//viewing security info in table
function view_security()
{
    $.ajax({
        url:'load_security.php',
        method:'post',
        success: function(data)
        {
            data = $.parseJSON(data);
            if(data.status == 'success')
            {
                $('#security_table').html(data.html);
            }
        }
    })
}

//load security info into modal
function get_security_info()
{
    $(document).on('click','#update_security',function()
    {
        var se_id = $(this).attr('security-id');
        $.ajax({
            url: 'load_security_info.php',
            method: 'post',
            data:{security_id: se_id},
            dataType: 'JSON',
            success: function(data)
            {
                $('#up_security_id').val(data[0]);
                $('#up_security_name').val(data[1]);
                $('#up_security_contact').val(data[2]);
                $('#up_security_email').val(data[3]);
                $('#up_security_password').val(data[4]);
                $('#up_security_address').val(data[5]);
                $('#show_security').modal('show');
                
            }
        })
    })
};

//load and update security info
function update_security_info()
{
    $(document).on('click','#up_security_info', function()
    {
        var up_security_id = $('#up_security_id').val();
        var up_security_name= $('#up_security_name').val();
        var up_security_contact = $('#up_security_contact').val();
        var up_security_email = $('#up_security_email').val()
        var up_security_password = $('#up_security_password').val();
        var up_security_address = $('#up_security_address').val();
        
        if(up_security_name == ""|| up_security_contact == ""|| up_security_email == ""|| up_security_password == ""|| up_security_address == "")
        {
            $('#up_message').html('Please fill the blank');
            $('#show_security').modal('show');
        }
        else
        {
         $.ajax({
             url: 'update_security.php',
             method: 'post',
             data:{up_security_id: up_security_id, up_security_name: up_security_name, up_security_contact: up_security_contact, 
                 up_security_email:up_security_email, up_security_password:up_security_password, up_security_address: up_security_address},
             success: function(data)
             {
                $('#up_message').html(data);
                $('#show_security').modal('show');
                $('form').trigger('reset');
                view_security();
             }
         })   
        }
    })
    $(document).on('click','#security_close', function(){
        $('form').trigger('reset');
        $('#up_message').html('');
    })
}

//deleting doctor info
function delete_security_info()
{
    $(document).on('click','#del_security', function()
    {
        var delete_security_id = $(this).attr('data-security-id');
        $('#delete_security').modal('show');
        
        $(document).on('click','#delete_security_info', function()
        {
            $.ajax({
            url:'delete_security.php',
            method:'post',
            data:{delete_security_id:delete_security_id},
            success: function(data)
            {
                $('#delete_message').html(data);
                view_security();
            }
        })
        })
        $(document).on('click','#security_del_close', function(){
        $('form').trigger('reset');
        $('#delete_message').html('');
        
    })
    })
}

function disable_security()
{
    $(document).on('click','#disable_security', function (){
        var disable_id = $(this).attr('disable-id');
        $.ajax ({
            url : 'security_disable.php',
            method : 'post' ,
            data : { disable_id : disable_id},
            success: function(data)
            {
            $('#info').modal('show');
            $('#disabled').html(data);
            view_security();   
            }
        })
        $(document).on('click','#disable_close', function(){
        $('form').trigger('reset');
        $('#disabled').html('');
    })
    })
}

function enable_security()
{
    $(document).on('click','#enable_security', function (){
        var enable_id = $(this).attr('enable-id');
        $.ajax ({
            url : 'security_enable.php',
            method : 'post' ,
            data : { enable_id : enable_id},
            success: function(data)
            {
            $('#enabl').modal('show');
            $('#enabled').html(data);
            view_security();   
            }
        })
        $(document).on('click','#enabled_close', function(){
        $('form').trigger('reset');
        $('#enabled').html('');
    })
    })
}


//viewing outpass info in table
function view_outpass()
{
    $.ajax({
        url:'load_outpass.php',
        method:'post',
        success: function(data)
        {
            data = $.parseJSON(data);
            if(data.status == 'success')
            {
                $('#outpass_table').html(data.html);
            }
        }
    })
}

function allow_out()
{
    $(document).on('click','#allow_out', function (){
        var out_id = $(this).attr('out-id');
        $.ajax ({
            url : 'allow_out.php',
            method : 'post' ,
            data : { out_id : out_id},
            success: function(data)
            {
            $('#info').modal('show');
            $('#allow').html(data);
            view_outpass();   
            }
        })
        $(document).on('click','#allow_close', function(){
        $('form').trigger('reset');
        $('#allow').html('');
    })
    })
}

function cancel_out()
{
    $(document).on('click','#cancel_out', function (){
        var cancel_out_id = $(this).attr('cancel-out-id');
        $.ajax ({
            url : 'cancel_out.php',
            method : 'post' ,
            data : { cancel_out_id : cancel_out_id},
            success: function(data)
            {
            $('#info').modal('show');
            $('#allow').html(data);
            view_outpass();   
            }
        })
        $(document).on('click','#allow_close', function(){
        $('form').trigger('reset');
        $('#allow').html('');
    })
    })
}

//viewing complaints info in table
function view_complaints()
{
    $.ajax({
        url:'load_complaint.php',
        method:'post',
        success: function(data)
        {
            data = $.parseJSON(data);
            if(data.status == 'success')
            {
                $('#complaint_table').html(data.html);
            }
        }
    })
}


function c_solve()
{
    $(document).on('click','#c_solve', function (){
        var solve_id = $(this).attr('solve-id');
        $.ajax ({
            url : 'c_solve.php',
            method : 'post' ,
            data : { solve_id : solve_id},
            success: function(data)
            {
            $('#info').modal('show');
            $('#complaint').html(data);
            view_complaints();   
            }
        })
        $(document).on('click','#complaint_close', function(){
        $('form').trigger('reset');
        $('#complaint').html('');
    })
    })
}


function view_events()
{
    $.ajax({
        url:'load_event.php',
        method:'post',
        success: function(data)
        {
            data = $.parseJSON(data);
            if(data.status == 'success')
            {
                $('#events_table').html(data.html);
            }
        }
    })
}

function get_event_info()
{
    $(document).on('click','#up_event',function()
    {
        var e_id = $(this).attr('up-event-id');
        $.ajax({
            url: 'load_event_info.php',
            method: 'post',
            data:{e_id: e_id},
            dataType: 'JSON',
            success: function(data)
            {
                $('#event_id').val(data[0]);
                $('#event_title').val(data[1]);
                $('#event_date').val(data[2]);
                $('#description').val(data[3]);
                $('#show_event').modal('show'); 
            }
        })
    })
};

function update_student_info()
{
    $(document).on('click','#up_event_info', function()
    {
        var event_id = $('#event_id').val();
        var event_title= $('#event_title').val();
        var event_date = $('#event_date').val();
        var description = $('#description').val();
        
        if(event_title == ""|| event_date == ""|| description == "")
        {
            $('#up_message').html('Please fill the blank');
            $('#show_event').modal('show');
        }
        else
        {
         $.ajax({
             url: 'update_event.php',
             method: 'post',
             data:{event_id: event_id,event_title:event_title, event_date: event_date, description: description},
             success: function(data)
             {
                $('#up_message').html(data);
                $('#show_event').modal('show');
                $('form').trigger('reset');
                view_events();
             }
         })   
        }
    })
    $(document).on('click','#event_close', function(){
        $('form').trigger('reset');
        $('#up_message').html('');
    })
}

function event_complete()
{
    $(document).on('click','#event_id', function (){
        var e_id = $(this).attr('e-id');
        $.ajax ({
            url : 'event_complete.php',
            method : 'post' ,
            data : { e_id : e_id},
            success: function(data)
            {
                $('#info').modal('show');
                $('#event').html(data);
                view_events();   
            }
        })
        $(document).on('click','#ev_close', function(){
        $('form').trigger('reset');
        $('#event').html('');
    })
    })
}
