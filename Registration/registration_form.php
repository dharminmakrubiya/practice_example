<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/
                libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- JS Crop image plugin CRM -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/2.3.4/cropper.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
    <title>Document</title>
    <style>
    .modal {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        transform: scale(1.1);
        transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
    }

    .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 1rem 1.5rem;
        width: 24rem;
        border-radius: 0.5rem;
    }

    .close-button {
        float: right;
        width: 1.5rem;
        line-height: 1.5rem;
        text-align: center;
        cursor: pointer;
        border-radius: 0.25rem;
        background-color: lightgray;
    }

    .close-button:hover {
        background-color: darkgray;
    }

    .show-modal {
        opacity: 1;
        visibility: visible;
        transform: scale(1.0);
        transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
    }
    </style>
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

    #crop_btn {
        color: #FF0000;
        font-size: 11px;
        display: none;
    }
    </style>

</head>

<body>

    <?php
      include "db.php";
      error_reporting(0);
      $msg = "";
    ?>


</body>

</html>

<section class="" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                <form class="mx-1 mx-md-4" name="myForm" action="store-registration.php"
                                    enctype="multipart/form-data" method="POST">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">

                                            <input type="text" id="name_id" name="name" class="form-control" />
                                            <span id="nameError">*Please enter your name</span>
                                            <label class="form-label" for="form3Example1c">Your Name</label>
                                        </div>
                                    </div>


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="user_name_id" name="user_name"
                                                class="form-control" />
                                            <span id="UsernameError">*Please enter your username</span>
                                            <label class="form-label" for="form3Example1c">User Name</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" id="user_email_id" name="email" class="form-control" />
                                            <span id="EmailError">*Please enter your email</span>
                                            <label class="form-label" for="form3Example3c">Your Email</label>
                                        </div>
                                    </div>



                                    <div class="row ">
                                        <div class="col-md-5 mb-4">
                                            <div class="form-outline">
                                                <input type="text" name="course[]" id="course_field_id"
                                                    class="form-control" />
                                                </input>
                                                <span id="CourseError">*Please enter your course</span>
                                                <label class="form-label" for="form3Example3c">Course</label>
                                            </div>

                                        </div>

                                        <div class="col-md-5 mb-4">
                                            <input type="text" name="year[]" class="form-control">
                                            <label class="form-label" for="form3Example3c">Year</label>
                                            </input>
                                        </div>


                                        <div class="col-md-2">
                                            <button id="rowAdder" onclick="IsEmpty();" type="button"
                                                class="btn btn-dark btn-sm float-right">
                                                <span class="bi bi-plus-square-dotted float-right">
                                                </span> Add
                                            </button>
                                        </div>





                                    </div>

                                    <!-- <div class="row"> -->
                                    <div id="DeleteRow">
                                    </div>

                                    <div id="newinput">
                                    </div>

                                    <!-- </div> -->


                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example3c">Gender:-</label>
                                            <input type="radio" name="gender" id="genderM" value="male"> Male
                                            <input type="radio" name="gender" id="genderF" value="female"> Female
                                            <span id="GenderError">*You have not selected any Gender</span>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example3c">Hobbies
                                                selection:-</label><br>
                                            <input type="checkbox" name="hobbies[]" id="hobbie_tv" value="tv" /> Tv
                                            <br />
                                            <input type="checkbox" name="hobbies[]" id="hobbie_pc" value="pc" />
                                            Computer
                                            <br />
                                            <input type="checkbox" name="hobbies[]" id="hobbie_book" value="book" />
                                            Reading books
                                            <br />
                                            <input type="checkbox" name="hobbies[]" id="hobbie_games" value="games" />
                                            Games
                                            <span id="HobbiesError">*Please select at least 2 Hobbies</span>
                                            <br /><br />

                                        </div>
                                    </div>



                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <textarea name="address" id="address_id" rows="5" cols="40"
                                                class="form-control form-control-lg"></textarea>
                                            <span id="AddressError">*Please enter your address</span>
                                            <label class="form-label" for="form3Example99">Address</label>
                                        </div>
                                    </div>




                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="password_id" name="password"
                                                class="form-control" />
                                            <span id="PasswordError">*Please enter your Password</span>
                                            <label class="form-label" for="form3Example4c">Password</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="file" id="file-input" accept="images/*" name="image"
                                                class="form-control" />


                                            <div class="box-2">
                                                <div class="result"></div>
                                            </div>

                                            <div class="box-2 img-result hide">
                                                <!-- result of crop my profile picture-->
                                                <img class="cropped" src="" alt="" />
                                            </div>

                                            <div class="box">
                                                <div class="options hide">
                                                    <label> Width </label>
                                                    <input type="number" class="img-w" value="300" min="100"
                                                        max="1200" />
                                                </div>
                                                <button class="btn save hide">Crop</button>

                                                <!-- <a href="" class="btn download hide">Download</a> -->
                                            </div>

                                        </div>
                                    </div>

                                    <button class="trigger">Click here!</button>
                                    <div class="modal">
                                        <div class="modal-content">
                                            <span class="close-button">&times;</span>
                                            <h1>Hello, I am Dharmin!</h1>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" name="submit" onclick="myFunction()"
                                class="btn btn-primary btn-lg">Register
                            </button>
                        </div>

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

<script type="text/javascript">
$(document).ready(function() {
    $("button").click(function(event) {
        event.preventDefault();
        // alert("prevented");
    });
});
</script>

<script>
const modal = document.querySelector(".modal");
const trigger = document.querySelector(".trigger");
const closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/0.8.1/cropper.min.js"></script>



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



<script>
let result = document.querySelector(".result"),
    img_result = document.querySelector(".img-result"),
    img_w = document.querySelector(".img-w"),
    img_h = document.querySelector(".img-h"),
    options = document.querySelector(".options"),
    save = document.querySelector(".save"),
    cropped = document.querySelector(".cropped"),
    dwn = document.querySelector(".download"),
    upload = document.querySelector("#file-input"),
    cropper = "";


upload.addEventListener("change", (e) => {
    if (e.target.files.length) {

        const reader = new FileReader();
        reader.onload = (e) => {
            if (e.target.result) {

                let img = document.createElement("img");
                img.id = "image";
                img.src = e.target.result;

                result.innerHTML = "";

                result.appendChild(img);

                save.classList.remove("hide");
                options.classList.remove("hide");

                cropper = new Cropper(img);
            }
        };
        reader.readAsDataURL(e.target.files[0]);
    }
});


save.addEventListener("click", (e) => {
    e.preventDefault();

    let imgSrc = cropper
        .getCroppedCanvas({
            width: img_w.value, // input value 
        })
        .toDataURL();

    cropped.classList.remove("hide");
    img_result.classList.remove("hide");

    cropped.src = imgSrc;
    dwn.classList.remove("hide");
    dwn.download = "imagename.png";
    dwn.setAttribute("href", imgSrc);
});
</script>