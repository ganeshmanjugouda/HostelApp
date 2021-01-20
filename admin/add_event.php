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
                        <h1 class="text-center form-control badge-info">New Event</h1>
                        <hr>
                        
                        <form action="actions.php" method="post" id="formAddEvent" enctype="multipart/form-data">
                            <input type="hidden" name="command" value="add_event"/>
                           
                            <div class="form-group">
                                <input type="text" id="event_title" name="event_title" placeholder="Event Title"
                                       autocomplete="off" class="form-control" required/>
                            </div>

                            <div class="form-group">
                                <input type="datetime-local" class="form-control" id="event_date" name="event_date"
                                       placeholder="Event Date" autocomplete="off" required/>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" id="description" name="description"
                                          rows="5" placeholder="Description" required></textarea>
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
