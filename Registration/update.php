<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>

    <script>
    function myFunction(e) {

        let fName = document.getElementById("name_id").value
        console.log(fName);

        if (fName == "") {
            document.getElementById("nameError").style.display = "block"
        } else {
            document.getElementById("nameError").style.display = "none"
        }




        let UName = document.getElementById("user_name_id").value
        console.log(UName);

        if (UName == "") {
            document.getElementById("UsernameError").style.display = "block"
        } else {
            document.getElementById("UsernameError").style.display = "none"
        }



        let EmailValidation = document.getElementById("user_email_id").value
        console.log(EmailValidation);

        if (EmailValidation == "") {
            document.getElementById("EmailError").style.display = "block"
        } else {
            document.getElementById("EmailError").style.display = "none"
        }


        let CourseValidation = document.getElementById("course_field_id").value
        console.log(CourseValidation);

        if (CourseValidation == "") {
            document.getElementById("CourseError").style.display = "block"
        } else {
            document.getElementById("CourseError").style.display = "none"
        }



        if (document.getElementById('genderM').checked) {
            document.getElementById("GenderError").style.display = "none"
        } else if (document.getElementById('genderF').checked) {
            document.getElementById("GenderError").style.display = "none"
        } else {
            document.getElementById("GenderError").style.display = "block"
        }



        if (document.getElementById('hobbie_tv').checked) {
            document.getElementById("HobbiesError").style.display = "none"
        } else if (document.getElementById('hobbie_pc').checked) {
            document.getElementById("HobbiesError").style.display = "none"
        } else if (document.getElementById('hobbie_book').checked) {
            document.getElementById("HobbiesError").style.display = "none"
        } else if (document.getElementById('hobbie_games').checked) {
            document.getElementById("HobbiesError").style.display = "none"
        } else {
            document.getElementById("HobbiesError").style.display = "block"
        }


        let AddressValidation = document.getElementById("address_id").value
        console.log(AddressValidation);

        if (AddressValidation == "") {
            document.getElementById("AddressError").style.display = "block"
        } else {
            document.getElementById("AddressError").style.display = "none"
        }

        let PasswordValidation = document.getElementById("password_id").value
        console.log(PasswordValidation);

        if (PasswordValidation == "") {
            document.getElementById("PasswordError").style.display = "block"
        } else {
            document.getElementById("PasswordError").style.display = "none"
        }

    }

    function Deleteconfirmation() {
        var result = confirm("Do you want to delete this record ?");
        if (result) {
            console.log("Deleted");
        }
    }


    function IsEmpty() {

        if (document.form.add_course.value == "") {
            alert("empty");
        }
        return;
    }
    </script>

    <style>
    #rowAdder {
        margin-left: 17px;
    }

    .p {
        color: #FF0000;
        font-size: 12px;
    }

    #nameError {
        color: #FF0000;
        font-size: 11px;
        display: none;
    }

    #UsernameError {
        color: #FF0000;
        font-size: 11px;
        display: none;
    }

    #EmailError {
        color: #FF0000;
        font-size: 11px;
        display: none;
    }

    #GenderError {
        color: #FF0000;
        font-size: 11px;
        display: none;
    }

    #HobbiesError {
        color: #FF0000;
        font-size: 11px;
        display: none;
    }

    #AddressError {
        color: #FF0000;
        font-size: 11px;
        display: none;
    }

    #PasswordError {
        color: #FF0000;
        font-size: 11px;
        display: none;
    }

    #CourseError {
        color: #FF0000;
        font-size: 11px;
        display: none;
    }
    </style>


    <?php
    
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        
        
        include "db.php";   

        if (isset($_POST['update'])) {

            $student_course = array('course' => $_POST['course'] );
            $student_course_year = array('year' => $_POST['year']);

            foreach ($student_course as $student_course_array_data) {
                // print_r($student_course_array_data);
            }
            
            foreach ($student_course_year as $student_course_year_array_data) {
                // print_r($student_course_year_array_data);
            }
            

            $firstname = $_POST['name'] ;
            $user_id  = $_POST['user_id'];
            $username  = $_POST['user_name'];
            $email = $_POST['email'];
            implode(",",$student_course_array_data);
            implode(",",$student_course_year_array_data);
            $gender = $_POST['gender'];
            $hobbie = implode("," , $_POST['hobbies']);
            $address =  $_POST['address'];
            $password = md5($_POST['password']);
            
            
            print_r($student_course_array_data);
            print_r($student_course_year_array_data);
                     

            $sql = "UPDATE `users` SET
            `name`='$firstname',
            `user_name`='$username',
            `email`='$email',
            `course` = '" . implode(",",$student_course_array_data) . "',
            `year` = '" . implode(",",$student_course_year_array_data) . "',
            `gender`='$gender',
            `hobbies`='$hobbie',
            `address`='$address',
            `password`='$password'
            WHERE `id`='$user_id'";


            
            $result = $conn->query($sql);

            if ($result == TRUE) {
                echo "Your Record updated successfully.";
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
                    $firstname = $row['name'] ;
                    $username  = $row['user_name'];
                    $email = $row['email'];
                    $student_course_array_data = $row['course'];
                    $student_course_year_array_data = $row['year'];
                    $gender = $row['gender'];
                    $hobbie = $row['hobbies'];
                    $address =  $row['address'];
                    $password = md5($row['password']);
                    $id = $row['id'];
                }
            ?>

    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Update User</p>

                                    <form class="mx-1 mx-md-4" enctype="multipart/form-data" method="POST">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="name_id" name="name" class="form-control"
                                                    value="<?php echo $firstname; ?>" />
                                                <span id="nameError">*Please enter your name</span>
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                            </div>
                                        </div>

                                        <input type="hidden" name="user_id" value="<?php echo $id; ?>">


                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="user_name_id" name="user_name"
                                                    class="form-control" value="<?php echo $username; ?>" />
                                                <span id="UsernameError">*Please enter your username</span>
                                                <label class="form-label" for="form3Example1c">User Name</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="user_email_id" name="email" class="form-control"
                                                    value="<?php echo $email; ?>" />
                                                <span id="EmailError">*Please enter your email</span>
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                            </div>
                                        </div>


                                        <div class="row ">
                                            <div class="col-md-5 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" name="course"
                                                        value="<?php echo $student_course_array_data; ?>"
                                                        id="course_field_id" class="form-control" />
                                                    </input>
                                                    <span id="CourseError">*Please enter your course</span>
                                                    <label class="form-label" for="form3Example3c">Course</label>
                                                </div>

                                            </div>

                                            <div class="col-md-5 mb-4">
                                                <input type="text" name="year"
                                                    value="<?php echo $student_course_year_array_data; ?>"
                                                    class="form-control">
                                                <label class="form-label" for="form3Example3c">Year</label>
                                                </input>
                                            </div>


                                            <div class="col-md-2">
                                                <button id="rowAdder" onclick="IsEmpty();" name="add_course"
                                                    type="button" class="btn btn-dark btn-sm float-right">
                                                    <span class="bi bi-plus-square-dotted float-right">
                                                    </span> Add
                                                </button>
                                            </div>


                                            <div id="DeleteRow">
                                            </div>

                                            <div id="newinput">
                                            </div>


                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Gender:-</label>
                                                <input type="radio" name="gender" id="genderM" checked> Male
                                                <input type="radio" name="gender" id="genderF"> Female
                                                <span id="GenderError">*You have not selected any Gender</span>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Hobbies
                                                    selection:-</label><br>


                                                <input type="checkbox" name="hobbies[]" id="hobbie_tv" value="tv"
                                                    <?php $check = isset($_POST['hobbies']) ? "checked" : "unchecked"; echo $check?> />
                                                Tv
                                                <br />
                                                <input type="checkbox" checked name="hobbies[]" id="hobbie_pc" value="pc"
                                                    <?php $check = isset($_POST['hobbies']) ? "checked" : "unchecked"; echo $check?> />
                                                Computer
                                                <br />
                                                <input type="checkbox" name="hobbies[]" id="hobbie_book" value="book"
                                                    <?php $check = isset($_POST['hobbies']) ? "checked" : "unchecked"; echo $check?> />
                                                Reading books
                                                <br />
                                                <input type="checkbox" name="hobbies[]" id="hobbie_games" value="games"
                                                    <?php $check = isset($_POST['hobbies']) ? "checked" : "unchecked"; echo $check?> />
                                                Games
                                                <span id="HobbiesError">*Please select at least 2 Hobbies</span>
                                                <br /><br />
                                            </div>
                                        </div>



                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="address" id="address_id"
                                                    value="<?php echo $address; ?>" rows="5" cols="40"
                                                    class="form-control form-control-lg"></input>
                                                <span id="AddressError">*Please enter your address</span>
                                                <label class="form-label" for="form3Example99">Address</label>
                                            </div>
                                        </div>




                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="password_id" name="password"
                                                    class="form-control" value="<?php echo $password; ?>" />
                                                <span id="PasswordError">*Please enter your Password</span>
                                                <label class="form-label" for="form3Example4c">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="File" id="form3Example1c" name="file"
                                                    class="form-control" />
                                                <label class="form-label" for="form3Example1c">Profile Picture</label>
                                            </div>
                                        </div>






                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" onclick="myFunction()" name="update"
                                                class="btn btn-primary btn-lg">Update</button>
                                        </div>

                                    </form>

                                </div>
                                <!-- <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                    class="img-fluid" alt="Sample image">

                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</head>

<body>

</body>

</html>

<?php
} 
else {
    header('Location:homepage.php');
    }
}
?>


<script type="text/javascript">
$("#rowAdder").click(function() {
    newRowAdd =
        '<div id="row" class="row justify-content-center">' +
        '<div class="col-md-5 mb-2">' +
        '<div class="form-outline">' +
        '<input type="text" name="course[]" class="form-control">' +
        '<label class="form-label" for="form3Example3c">Course</label>' +
        '</div>' +
        '</div>' +
        '<div class="col-md-5 mb-2">' +
        '<input type="text" name="year[]" class="form-control">' +
        '<label class="form-label" for="form3Example3c">Year</label>' +
        '</div>' +
        '<div class="col-md-2">' +
        '<button class="btn btn-sm btn-danger" onclick="Deleteconfirmation()" id="DeleteRow" type="button">' +
        'Delete </button>' +
        '</div>' +
        '</div>';
    // $("#newinput").clone().insertAfter("div.course_class");
    $('#newinput').append(newRowAdd);

});
$("body").on("click", "#DeleteRow", function() {
    $(this).parents("#row").remove();
})
</script>