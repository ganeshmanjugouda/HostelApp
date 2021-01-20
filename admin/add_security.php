<?php

include_once './session.php';
include_once '../include/header.php';
?>

<body class="login">

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center form-control badge-info">New Security</h1>
                        <hr>
                        
                        <form action="actions.php" method="post" id="formAddDoctor" enctype="multipart/form-data">
                            <input type="hidden" name="command" value="add_security"/>
                           
                            <div class="form-group">
                                <input type="text" id="security_name" name="security_name" placeholder="Name"
                                       autocomplete="off" class="form-control" required/>
                            </div>

                            <div class="form-group">
                                <input class="form-control" id="contact_no" name="contact_no"
                                       placeholder="Contact No" autocomplete="off" required/>
                            </div>

                            <div class="form-group">
                                <input class="form-control" id="mailAddress" name="mail_id"
                                       placeholder="EmailID" autocomplete="off" required/>
                            </div>
                            
                             <div class="form-group">
                                 <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Password" autocomplete="off" required/>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" id="address" name="address"
                                          rows="5" placeholder="Address" required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-success btn-block">Save</button>
                            </div>
                            <?php if (isset($_SESSION['success']) != '') { ?>
                                <div class="form-group">
                                    <label class="form-control badge-info text-center" ><?php echo $_SESSION['success']; ?></label>
                                </div>
                            <?php } unset($_SESSION['success']); ?>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

<?php include_once '../include/footer.php';?>
