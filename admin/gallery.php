<?php  
include_once './session.php';
include '../db/db.class.php';
include_once '../include/header.php';
$db = new DB();  
 if(isset($_POST["insert"]))  
 {  
      $g_title =$_POST['image_title'] ;
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO gallery(g_title, image, g_date) VALUES ('$g_title','$file',NOW())";  
      $db->executeInsertAndGetId($query);  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  
 }  
 ?>   
           <div class="container" style="width:500px;">  
                <h3 align="center">Insert and Display Images</h3>  
                <br />  
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" id="image_title" name="image_title" placeholder="Image Title"
                               autocomplete="off" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" id="image" /> 
                    </div>
                     <br />
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                </form>  
                <br />  
                <br />  
                <table class="table table-bordered">  
                     <tr>  
                          <th>Image</th>  
                     </tr>  
                <?php  
                $query = "SELECT * FROM gallery ORDER BY g_id DESC";  
                $result = $db->executeSelect($query);
                foreach ($result as $row)
                {  
                     echo '  
                         
                        <div class="card-deck">
                          <div class="card">
                            <img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                            <div class="card-footer">
                              <small class="text-muted">Last updated 3 mins ago</small>
                            </div>
                          </div>
                          </div>
                        
                          <tr>  
                               <td>  
                                    <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200" class="img-thumnail" />  
                                    <label>'.$row['g_title'].'</label>
                                    <label>'.$row['g_date'].'</label>
                                    <button class="btn btn-danger"> Remove</button>
                                </td>
                          </tr>  
                     ';  
                }  
                ?>  
                </table>  
           </div> 
<?php include_once '../include/footer.php'; ?>
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  
 
 