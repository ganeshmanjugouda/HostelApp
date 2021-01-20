<head>
    <meta charset="UTF-8">
    <title>Hostel App</title>
    <link href="../static/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="../static/css/jquery.min.css" type="text/css" rel="stylesheet">
    <link href="../static/css/fonts.css" type="text/css" rel="stylesheet">
    <link href="../static/css/style.css" type="text/css" rel="stylesheet">
    <!--<link href="../static/css/custom.css" type="text/css" rel="stylesheet">--> 
    
                     
    <div class="wrapper">
        
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <h3>Hostel App</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Admin Dashboard</p>
                <li>
                    <a href="../admin/home.php" class="active">Home</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" ><i class="fa fa-caret-down" style="float:right"></i>Student</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="../admin/add_student.php">Add</a>
                        </li>
                        <li>
                            <a href="../admin/view_student.php">View</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false"><i class="fa fa-caret-down" style="float:right"></i>Out pass</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1">
                        <li>
                            <a href="../admin/view_outpass.php">View</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false"><i class="fa fa-caret-down" style="float:right"></i>Events</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li>
                            <a href="../admin/add_event.php">Add</a>
                        </li>
                        <li>
                            <a href="../admin/view_events.php">View</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="../admin/gallery.php">Gallery</a>
                </li>
                <li>
                    <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false"><i class="fa fa-caret-down" style="float:right"></i>Complaints</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu4">
                        <li>
                            <a href="../admin/view_complaints.php">View</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false"><i class="fa fa-caret-down" style="float:right"></i>Security</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu5">
                        <li>
                            <a href="../admin/add_security.php">Add</a>
                        </li>
                        <li>
                            <a href="../admin/view_security.php">View</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fa fa-align-left"></i>
                        <span>Hostel App</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../admin/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <div id="main">
                
                
    


