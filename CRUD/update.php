<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
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
    <?php

    include "config.php";
    
    if (isset($_POST['update'])) {
        $firstname = $_POST['firstname'];
        $user_id = $_POST['user_id'];
        echo $user_id;
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $sql = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`password`='$password',`gender`='$gender' WHERE `id`='$user_id'";



        // $sql_main_result = ""UPDATE 'users' SET 'firstname'='$firstname','lastname'='$lastname','email'='$email','password'='$password','gender'='$gender'
        // WHERE 'id'='$user_id'";

        $result = $conn->query($sql);

        if ($result == TRUE) {
            echo "Record updated successfully.";
        } else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
        
    }


    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];
        $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $first_name = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $password  = $row['password'];
                $gender = $row['gender'];
                $id = $row['id'];
            }
        
        ?>
            <section class="h-100 bg-dark">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div class="card card-registration my-4">
                                <div class="row g-0">
                                    <div class="col-xl-6 d-none d-xl-block">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card-body p-md-5 text-black">
                                            <h3 class="mb-5 text-uppercase">Update Student registration form</h3>

                                            <form action="" method="post">
                                                <div class="form-outline mb-4">
                                                    <input type="text" name="firstname" value="<?php echo $first_name; ?>" class="form-control form-control-lg" required>
                                                    <label class="form-label" for="form3Example9">First Name</label>
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control form-control-lg" required>
                                                    <label class="form-label" for="form3Example90">Last Name</label>
                                                </div>
                                                <input type="hidden" name="user_id" value="<?php echo $id; ?>">

                                                <div class="form-outline mb-4">
                                                    <input type="email" name="email" id="txtEmail" value="<?php echo $email; ?>" class="form-control form-control-lg" required>
                                                    <label class="form-label" for="form3Example97">Email ID</label>
                                                </div>

                                                <div class="form-outline mb-4">
                                                    <input type="password" name="password" id="txtPaswword" value="<?php echo $password; ?>" class="form-control form-control-lg" required>
                                                    <label class="form-label" for="form3Example99">Password</label>
                                                </div>

                                                <h6 class="mb-0 me-4">Gender: </h6>

                                                <div class="form-check form-check-inline mb-0 me-4">
                                                    <input type="radio" name="gender" value="Female" 
                                                    <?php 
                                                        if ($gender == 'Female') {
                                                            echo "checked";
                                                        } 
                                                    ?>
                                                    class="form-check-input">Female
                                                </div>

                                                <div class="form-check form-check-inline mb-0 me-4">
                                                    <input type="radio" name="gender" value="Male" 
                                                    <?php if ($gender == 'Male') {
                                                        echo "checked";
                                                        } 
                                                    ?>
                                                    class="form-check-input">Male
                                                </div>

                                                <div class="d-flex justify-content-end pt-3">
                                                    <input type="submit" value="Update" name="update" onclick="checkEmail()" class="btn btn-warning btn-lg ms-2">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </body>

</html>

<?php
} else {
    header('Location:view.php');
    }
}
?>