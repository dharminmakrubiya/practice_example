<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['submit']) && $_POST['email'])
{   
    include "db.php";
    $result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $_POST['email'] . "'");
    $row= mysqli_num_rows($result);
    if($row < 1)
    {

        $student_course = array('course' => $_POST['course'] );
        $student_course_year = array('year' => $_POST['year']);
        
        
        
        foreach ($student_course as $student_course_array_data) {
            // print_r($student_course_array_data);
        }

        foreach ($student_course_year as $student_course_year_array_data) {
            // print_r($student_course_year_array_data);
        }
        

        $token = md5($_POST['email']).rand(10,9999);
        // $h=implode(",",$hobbies);

        foreach ($_POST['hobbies'] as $hobbies) {
        }
        

        // $file_upload_size = upload_max_filesize = 2M;
        $filename = $_FILES["image"]["name"];
        // $tempname = $_FILES["uploadfile"]["tmp_name"];
        
        
        // $folder = "./upload/" . $filename ;
        
        mysqli_query(
            $conn, 
            "INSERT INTO users(
                `name`,
                `user_name`,
                `email`,
                `course`,
                `year`,
                `gender`,
                `hobbies`,
                `address`,
                `email_verification_link`,
                `password`,
                `filename`)
            VALUES(
                '" . $_POST['name'] . "',
                '" . $_POST['user_name'] . "',
                '" . $_POST['email'] . "',
                '" . implode(",",$student_course_array_data) . "',
                '" . implode(",",$student_course_year_array_data) . "',
                '" . $_POST['gender'] . "',
                '" . $hobbies . "',
                '" . $_POST['address'] . "',
                '" . $token . "',
                '" . md5($_POST['password']) . "',
                '" . $filename . "')");


                
                if(isset($_FILES['image'])){
                    $errors= array();
                    $filename = $_FILES['image']['name'];
                    $file_size =$_FILES['image']['size'];
                    $file_tmp =$_FILES['image']['tmp_name'];
                    $file_type=$_FILES['image']['type'];
                    // $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
                    
                    // $extensions= array("jpeg","jpg","png");
                    
                    // if(in_array($file_ext,$extensions)=== false){
                    //    $errors[]="please choose a JPEG or PNG file.";
                    // }
                    
                    if($file_size > 2097152){
                       $errors[]='File size must be excately 2 MB';
                    }
                    
                    if(empty($errors)==true){
                       move_uploaded_file($file_tmp,"images/".$filename);
                       echo "Profile Picture Upload Successfully.";
                    }else{
                       print_r($errors);
                    }
                 }

                die;
            
                // if(isset($_FILES['filename'])) {
                //     $errors     = array();
                //     $maxsize    = 2097152;
                //     $file_type = array(
                //         'application/pdf',
                //         'image/jpeg',
                //         'image/jpg',
                //         'image/png'
                //     );
                
                //     if(($_FILES['filename']['size'] >= $maxsize) || ($_FILES["filename"]["size"] == 0)) {
                //         $errors[] = 'File too large. File must be less than 2 mb.';
                //     }
                
                //     if((!in_array($_FILES['filename']['type'], $file_type)) && (!empty($_FILES["filename"]["type"]))) {
                //         $errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
                //     }

                //     // if (($_FILES['filename']['size'] >= $maxsize) || ($_FILES["filename"]["size"] == 0)) {
                //     /0/ }   
                
                //     if(count($errors) === 0) {
                //         move_uploaded_file($_FILES['filename'], '/PracticeExample/Registration/upload/".$filename');
                //     } else {
                //       0.  foreach($errors as $error) {
                //             echo '<script>alert("'.$error.'");</script>';
                //         }
                
                //         die(); 
                //     }
                // }


                // if (move_uploaded_file($tempname, $folder)) {
                //     echo "<h3>  Image uploaded successfully!</h3>";
                // } else {
                //     echo "<h3>  Failed to upload image!</h3>";
                // }
                // $file_name = $_FILES['file']['name'];
                // $file_type = $_FILES['file']['type'];
                // $file_size = $_FILES['file']['size'];
                // $file_tem_loc = $_FILES['file']['tmp_name'];
                // $file_store = "PracticeExample/Registration/upload/".$file_name;
                

                // move_uploaded_file($tempname,$folder);
                
                
        $link = "<a href='localhost/PracticeExample/Registration/verify-email.php?key=".$_POST['email']."&token=".$token."'>Click and Verify Email</a>";
        
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host	 = 'smtp.gmail.com';
        $mail->SMTPAuth = true;	
        $mail->Username = 'dharminmakrubiya18@gmail.com';
        $mail->Password = 'xounufdhdwandmxv';
        $mail->SMTPSecure = 'ssl';
        $mail->Port	 = 465;
        $mail->setFrom('dharminmakrubiya18@gmail.com', 'My Company');
        $mail->addAddress($_POST['email']);
        $mail->isHTML(true);
        $mail->Body    = 'Click On This Link to Verify Email '.$link.'';
        
        $mail->send();
                
        echo "Mail Sent Successfully.Check Your email box and verify email.";
        
        

    }
else
{
    echo "You have already registered with us. Check Your email box and verify email.";
}
}


?>