<?php
session_start();

$error = '';

if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

if (isset($_POST['command'])) {
    $userName = $_POST['username'];
    $password = $_POST['password'];

    if ('admin' == $userName && 'admin' == $password) {
        $_SESSION['admin'] = true;
        $_SESSION['login'] = true;
        header('location: home.php');
    } else {
        $error = "Invalid login credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
    <link href="../static/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="../static/css/jquery.min.css" type="text/css" rel="stylesheet">
    <link href="../static/css/fonts.css" type="text/css" rel="stylesheet">
    <link href="../static/css/custom.css" type="text/css" rel="stylesheet"> 
    
    <body class="login" style="background-image: url('../static/images/adminlogin.jpg');">
        <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
            <a class="navbar-brand" href="#">Hostel App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-white" href="login.php">Admin Login</a>
                    </li>

                </ul>
            </div>
        </nav>



        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Admin Login</h3>
                            <hr>
                            <form method="post" action="#">
                                <input type="hidden" name="command" value="adminlogin">
                                <div class="form-group">
                                    <input class=form-control type="text" id="username" name="username"
                                           placeholder="Username" autocomplete="off" required/>
                                </div>
                                <div class="form-group">
                                    <input class=form-control type="password" id="password" name="password"
                                           placeholder="Password" autocomplete="off" required/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-secondary btn-block">Sign In</button>
                                </div>
                                <?php if (!empty($error)) { ?>
                                    <div class="alert alert-danger text-center">
                                        <?php echo $error; ?>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        require_once '../include/footer.php';
        ?>
    </body>
</html>