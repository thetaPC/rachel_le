<?php
    session_start();
    include 'database/db_connection.php';
    if (isset($_SESSION["login"])) {  //Check whether the admin has logged in
        if ($_SESSION["login"] == "Y") {
            header('Location: dashboard.php');
            exit();
        }
    }
    
    // $hashed_passworddb = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
    // echo $hashed_passworddb;
    $sql = "SELECT username, password FROM admin WHERE username='" . $_POST['username'] . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row["password"];
        if (password_verify($_POST['pwd'], $row["password"])) {
            $_SESSION['login'] = "Y";
            echo "up";
            header('Location: dashboard.php');
            exit();
        } else {
            $_SESSION['login'] = "N";
            echo "nope";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rachel - Login</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/social.css">
    <link rel="stylesheet" href="css/login.css" type="text/css" />
  </head>

  <body>

    <?php include 'src/repeats/navbar.php'; ?>
    <?php include 'src/repeats/social.php'; ?>
    

    <div id="login" class="login-section">
        <div class="container login">
            <div class="row justify-content-center">
                <div class="col-5">
                    <h2>Admin Login</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-5">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" name="pwd" class="form-control" id="pwd">
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
  </body>
</html>
