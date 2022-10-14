<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
</head>

<body>
    <?php
    session_start();
    $message = "";
    if (count($_POST) > 0) {
        $con = mysqli_connect('localhost', 'root', '', 'my_db') or die('Unable To connect');
        $result = mysqli_query($con, "SELECT * FROM users WHERE user_name='" . $_POST["user_name"] . "' and password = '" . $_POST["password"] . "'");
        $row  = mysqli_fetch_array($result);
        if (is_array($row)) {
            $_SESSION["id"] = $row['id'];
            $_SESSION["name"] = $row['name'];
        } else {
            $message = "Invalid Username or Password!";
        }
    }
    if (isset($_SESSION["id"])) {
        header("Location:homepage.php");
    }
    ?>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <!--
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
                </div> 
            -->
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form name="frmUser" method="POST" action="">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <h3 align="center">Enter Login Details</h3>
                            
                        </div>
                        
                        <div class="form-outline mb-4">
                        <?php if ($message != "") {
                                echo $message;
                            } ?>
                            <input type="text" id="username" name="user_name" class="form-control form-control-lg" placeholder="Enter a Username" />
                            <label class="form-label" for="form3Example3">User Name</label>
                        </div>

                        

                        
                        <div class="form-outline mb-3">
                            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter password" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#!" class="text-body">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <input type="reset" class="btn btn-secondary btn-lg">
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="registration_form.php" class="link-danger">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>