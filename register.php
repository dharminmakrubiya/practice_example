<?php
include "connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 
$msg = "";

$n=10;
function getLink($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 
    return $randomString;
}
 
// echo getLink($n);
// function generateNumericOTP($n)
// {
//     $generator = "1357902468";
//     $result = "";
//     for ($i = 1; $i <= $n; $i++) {
//         $result .= substr($generator, (rand() % (strlen($generator))), 1);
//     }
//     return $result;
// }

// $message_otp = getLink($n);
// $otp_add = $message_otp;

// print_r($otp_add);


// if (isset($_POST['otp'])) {
    
    
// }



if (isset($_POST['submit'])) {

    $n = 20;
    $message_otp = getLink($n);
    $otp_add = $message_otp;
    

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = false;									
        $mail->isSMTP();											
        $mail->Host	 = 'smtp.gmail.com';					
        $mail->SMTPAuth = true;							
        $mail->Username = 'dharminmakrubiya18@gmail.com';				
        $mail->Password = 'xounufdhdwandmxv';						
        $mail->SMTPSecure = 'tls';							
        $mail->Port	 = 587;
        
        $mail->setFrom('dharminmakrubiya18@gmail.com', 'My Company');		
        $mail->addAddress('dharminmakrubiya@hotmail.com');
        // $mail->addAddress('dharminmakrubiya@hotmail.com', 'DM');
        
        $mail->isHTML(true);								
        $mail->Subject = 'User Signup';
        $mail->Body = 'Congratulations! Your Account Has Been <b>Successfully</b> Created.';
        $mail->Body = '<p>Dear user, </p> <h3>Your verification Link is:- '.$otp_add.' <br></h3>';
        $mail->AltBody = 'Thanks For signing up.';
        $mail->send();
        // echo "Mail has been sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    
    $first_name = $_POST['name'];
    if (empty($first_name)) {
        $_SESSION['error_name'] = "*Please enter your firstname";
    }
    elseif (!preg_match ("/^[a-zA-z]*$/", $first_name) ) {  
        $_SESSION['error_name'] = "*Only alphabets and whitespace are allowed.";
    }

    
    $username = $_POST['user_name'];
    if (empty($username)) {
        $_SESSION['error_user_name'] = "*Please enter your username";
    }
    elseif (!preg_match('/[a-z]/', $username)) {
        $_SESSION['error_user_name'] = "*Please enter only lowercase letters";
    }


    $email = $_POST['email'];
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
    if (empty($email)) {
        $_SESSION['error_email'] = "*Please enter your email address";
    }
    elseif (!preg_match ($pattern, $email)) {
        $_SESSION['error_email'] = "*Email is not valid.";
    }

    $otp_field = $_POST['otp_text'];
    

    

    $password = $_POST['password'];
    $pattern_password="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}";
    if (empty($password)) {
        $_SESSION['password'] = "*Please enter your password";
    }
    // elseif (!preg_match ($pattern_password, $password)) {
    //     $_SESSION['password'] = "*Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters";
    // }
    $password = md5($password);


    $gender = $_POST['gender'];
    if (empty($gender)) {
        $_SESSION['gender_error'] = "*Gender field is required";
    }

    $address = $_POST['address'];
    if (empty($address)) {
        $_SESSION['address_error'] = "*Please enter address";
    }



    if(!empty($_POST['hb'])) {
        foreach($_POST['hb'] as $hobbies) {
            //echo "<p>".$hobbies ."</p>";
        }   
    }
    else {
        $_SESSION['hobbies_error'] = "*Please Select at least One Hobby.";
    }

    $image = $_FILES['image']['name'];
    $target = "images/".basename($image);
    
    $sql = "INSERT INTO `login_user`(`image`,`name`,`user_name`,`email`,`password`,`gender`,`hobbies`,`address`,`email_verification_link`) VALUES ('$image','$first_name','$username','$email','$password','$gender','$hobbies','$address','$message_otp')";
    
    $result = $conn->query($sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
    $result = mysqli_query($conn, "SELECT * FROM login_user");
    if ($result == TRUE) {
        // $message = "Your contact information is received successfully.";
        // echo "Your Account created successfully..";
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>
<?php

// if (isset($_GET['id'])) {
//     $user_id = $_GET['id'];
//     $sql = "SELECT * FROM `login_user` WHERE `id`='$user_id'";
//     $result_get = $conn->query($sql);
//     if ($result_get->num_rows > 0) {
//         while ($row = $result_get->fetch_assoc()) {
//             $first_name = $row['name'];
//             $username = $row['username'];
//             $email = $row['email'];
//             $gender = $row['gender'];
//             $hobbies = $row['hb'];
//             $address = $row['address'];
//             $password  = $row['password'];
//             $

//         }
//     }
// }
 
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .error {
        color: #FF0000;
        font-size: 12px;
    }

    .success {
        background-color: #9fd2a1;
        padding: 5px 10px;
        color: #326b07;
        text-align: center;
        border-radius: 3px;
        font-size: 14px;
        margin-top: 10px;
    }

    .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
    }

    .card-registration .select-arrow {
        top: 13px;
    }
    </style>


</head>

<?php
if($_GET['email_verification_link'])
{
    include "connection.php";
    $token = $_GET['email_verification_link'];
    $query = mysqli_query($conn,
    "SELECT * FROM `login_user` WHERE `email_verification_link`='".$token."' and `email`='".$email."';");
    
    $d = date('Y-m-d H:i:s');
    
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_array($query);
            if($row['email_verified_at'] == NULL){
                mysqli_query($conn,"UPDATE login_user set email_verified_at ='" . $d . "' WHERE email='" . $email . "'");
                    $msg = "Congratulations! Your email has been verified.";
                    
            }else{
                    $msg = "You have already verified your account with us";
            }
        } else {
                $msg = "This email has been not registered with us";
        }
}
else
{
    $msg = "Your something goes to wrong.";
}

?>


<section class="h-100 bg-dark">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card card-registration my-4">
                    <div class="row g-0">

                        <div class="col-xl-6 d-none d-xl-block">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                                alt="Sample photo" class="img-fluid"
                                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                        </div>

                        <div class="col-xl-6">
                            <div class="card-body p-md-5 text-black">
                                <h3 class="mb-5 text-uppercase">registration form</h3>

                                <form method="POST" action="" enctype="multipart/form-data">
                                    <input type="hidden" name="size" value="1000000">
                                    <div class="form-outline mb-4">
                                        <input type="file" name="image" class="form-control form-control-lg">
                                        <label class="form-label" for="form3Example9">Profile Upload</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <div class='error'>
                                            <?php echo   $_SESSION['error_name']; ?>
                                        </div>
                                        <input type="text" name="name" class="form-control form-control-lg">
                                        <label class="form-label" for="form3Example9">First Name</label>
                                        <input type="hidden" name="user_id" value="<?php echo $id; ?>">
                                    </div>

                                    <div class="form-outline mb-4">
                                        <div class='error'>
                                            <?php echo   $_SESSION['error_user_name']; ?>
                                        </div>
                                        <input type="text" name="user_name" class="form-control form-control-lg">
                                        <label class="form-label" for="form3Example9">Username</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <div class='error'>
                                            <?php echo   $_SESSION['error_email']; ?>
                                        </div>
                                        <input type="email" name="email" class="form-control form-control-lg">
                                        <label class="form-label" for="form3Example9">Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <div class='error'>
                                            <?php echo   $_SESSION['gender_error']; ?>
                                        </div>
                                        <label class="form-label" for="form3Example9">Gender:-</label>
                                        <input type="radio" name="gender" value="male"> Male
                                        <input type="radio" name="gender" value="female"> Female

                                    </div>


                                    <div class="form-outline mb-4">
                                        <div class='error'>
                                            <?php echo   $_SESSION['hobbies_error']; ?>
                                        </div>
                                        <label class="form-label" for="form3Example99">Hobbies selection:-</label><br>
                                        <input type="checkbox" name="hb[]" value="tv" /> Tv
                                        <br />
                                        <input type="checkbox" name="hb[]" value="pc" /> Computer
                                        <br />
                                        <input type="checkbox" name="hb[]" value="book" /> Reading books
                                        <br />
                                        <input type="checkbox" name="hb[]" value="games" /> Games
                                        <br /><br />
                                    </div>


                                    <div class="form-outline mb-4">
                                        <div class='error'>
                                            <?php echo   $_SESSION['address_error']; ?>
                                        </div>
                                        <textarea name="address" rows="5" cols="40"
                                            class="form-control form-control-lg"></textarea>
                                        <label class="form-label" for="form3Example99">Address</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <div class='error'>
                                            <?php echo   $_SESSION['password']; ?>
                                        </div>
                                        <input type="password" name="password" id="txtPaswword"
                                            class="form-control form-control-lg">
                                        <label class="form-label" for="form3Example99">Password</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <div class='error'>
                                            <?php echo   $_SESSION['otp_text_error']; ?>
                                        </div>
                                        <!-- <input type="text" name="otp_text" id="" class="form-control" /> -->
                                        <!-- <button type="submit" name="otp" class="btn btn-primary btn-small">OTP</button> -->
                                    </div>


                                    <div class="d-flex justify-content-end pt-3">
                                        <input type="submit" name="submit" onclick="verifyPassword()" value="submit"
                                            class="btn btn-warning btn-lg ms-2 ">
                                        <input type="reset" class="btn btn-secondary btn-lg">
                                    </div>


                                    <?php if (! empty($message)) {?>
                                    <div class='success'>
                                        <strong><?php echo $message; ?> </strong>
                                    </div>
                                    <?php } ?>
                                    <!--p><?php echo $msg; ?></p> -->
                                    <div>
                                        <p class="small fw-bold mt-2 pt-1 mb-0">have an account? <a href="login.php"
                                                class="link-danger">Login</a></p>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</html>