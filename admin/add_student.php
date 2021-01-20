<?php
include_once './session.php';
include '../db/db.class.php';
include_once '../include/header.php';
?>

    <!--<body class="login">-->
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center form-control" style="color: black; background-color: greenyellow">Select a file to upload</h3>
                        <hr>
                        <form method="post" action="#" id="export_excel">
                            <div class="form-group">
                                <input type="file" name="excel_file" id="excel_file">&nbsp;<label>Only .xlsx file</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>&nbsp;
    
    <div class=" bg-white" style="overflow-x: scroll">&nbsp;
        <div id="result">
            
        </div>
    </div>
    <!--</body>-->

<?php include_once '../include/footer.php'; ?>