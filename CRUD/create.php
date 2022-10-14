<?php

include "config.php";


if (isset($_POST['submit'])) {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];


    $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `gender`) VALUES ('$first_name','$last_name','$email','$password','$gender')";
    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "New record created successfully..";
        // header('Location: view.php');
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>



<!--

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`id` = marks.`id`
ORDER BY users.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id` 
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`gujrati` >= 50 ;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
INNER JOIN users ON users.`id` = marks.`id` 
INNER JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`gujrati` <= 50 ;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id` 
INNER JOIN practical ON practical.`id` = marks.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
INNER JOIN practical ON practical.`id` = marks.`id`
LEFT JOIN users ON users.`id` = marks.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
RIGHT JOIN practical ON practical.`id` = marks.`id`
RIGHT JOIN users ON users.`id` = marks.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
RIGHT JOIN practical ON practical.`id` = marks.`id`
RIGHT JOIN users ON users.`id` = marks.`id`
ORDER BY users.`id` DESC;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN practical ON practical.`id` = marks.`id`
RIGHT JOIN users ON users.`id` = marks.`id`
ORDER BY users.`id` ASC;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
LEFT JOIN practical ON practical.`id` = marks.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id`
LEFT JOIN practical ON practical.`id` = marks.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id`
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE users.`id` >= 5;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks 
RIGHT JOIN users ON users.`id` = marks.`id`
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`maths` >= 33;



SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = marks.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = marks.`id`	 
GROUP BY marks.`id`;

 

SELECT * FROM users s FULL JOIN marks m ON s.id = m.id WHERE m.id > 5;

SELECT * FROM users LEFT JOIN marks ON users.`id` = marks.`id`;

SELECT * FROM users RIGHT JOIN marks ON users.`id` = marks.`id`;

SELECT * FROM marks m FULL  JOIN users s ON m.id = s.id;

SELECT * FROM users 
INNER JOIN marks
ON users.id = marks.id;
  

SELECT *
  FROM users
  INNER JOIN marks
  ON users.id = marks.id
  INNER JOIN practical
  ON marks.id = practical.id; 
  
 SELECT *
  FROM users
  LEFT JOIN marks
  ON users.id = marks.id
  LEFT JOIN practical
  ON marks.id = practical.id; 
  
  
  SELECT *
  FROM users
  RIGHT JOIN marks
  ON users.id = marks.id
  RIGHT JOIN practical
  ON marks.id = practical.id;  
  
  
SELECT * FROM users
FULL JOIN marks
ON users.id = marks.id;



    
SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`id` = marks.`id`
ORDER BY users.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id` 
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`gujrati` >= 50 ;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
INNER JOIN users ON users.`id` = marks.`id` 
INNER JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`gujrati` <= 50 ;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id` 
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 5;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id` 
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 5;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id` 
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 5;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks 
RIGHT JOIN users ON users.`id` = marks.`id`
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE practical.`id` <= 4;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
INNER JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`id` = marks.`id` 
WHERE practical.`id` >= 4;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
INNER JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 5;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id` 
RIGHT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 5;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = marks.`id`
ORDER BY users.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer` 
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = marks.`id` 
WHERE marks.`id` <= 3
ORDER BY users.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id`
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 3
ORDER BY marks.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks 
RIGHT JOIN users ON users.`id` = marks.`id`
LEFT JOIN practical ON practical.`id` = marks.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = users.`id`
WHERE marks.`maths` <= 33
ORDER BY marks.`id`
;



SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`id` = marks.`id`
ORDER BY users.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id` 
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`gujrati` >= 50 ;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
INNER JOIN users ON users.`id` = marks.`id` 
INNER JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`gujrati` <= 50 ;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id` 
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 5;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id` 
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 5;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id` 
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 5;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks 
RIGHT JOIN users ON users.`id` = marks.`id`
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE practical.`id` <= 4;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
INNER JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`id` = marks.`id` 
WHERE practical.`id` >= 4;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
INNER JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 5;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id` 
RIGHT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 5;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = marks.`id`
ORDER BY users.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer` 
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = marks.`id` 
WHERE marks.`id` <= 3
ORDER BY users.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id`
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 3
ORDER BY marks.`id`;



SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks 
RIGHT JOIN users ON users.`id` = marks.`id`
LEFT JOIN practical ON practical.`id` = marks.`id`;



SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = users.`id`
WHERE marks.`maths` <= 33
ORDER BY marks.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = users.`id`
ORDER BY marks.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = users.`id`;



 SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`
   FROM users
   FULL JOIN marks
   ON marks.`id` = users.`id`;
   
   
SELECT users.`id`,users.`firstname`,users.`lastname`,users.`gender`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
FULL JOIN users ON users.`id` = marks.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = users.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer` FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
LEFT JOIN practical ON practical.`id` = users.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks 
LEFT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = users.`id`;

SELECT users.`id`,
		users.`firstname`,
		users.`lastname`,
		users.`gender`,
		marks.`id`,
		marks.`gk`,
		marks.`gujrati`,
		marks.`hindi`,
		marks.`maths`,
		marks.`sanskrit`,
		marks.`science`,
		marks.`social science`,
		practical.`id`,
		practical.`computer`
FROM marks 
LEFT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = users.`id`;




SELECT users.`id`,
		users.`firstname`,
		users.`lastname`,
		users.`gender`,
		marks.`id`,
		marks.`gk`,
		marks.`gujrati`,
		marks.`hindi`,
		marks.`maths`,
		marks.`sanskrit`,
		marks.`science`,
		marks.`social science`
FROM marks 
RIGHT JOIN users ON users.`id` = marks.`id`;

SELECT users.`id`,
		users.`firstname`,
		users.`lastname`,
		users.`gender`,
		users.`current_date`,
		marks.`id`,
		marks.`gk`,
		marks.`gujrati`,
		marks.`hindi`,
		marks.`maths`,
		marks.`sanskrit`,
		marks.`science`,
		marks.`social science`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks 
LEFT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = users.`id`;








SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`id` = marks.`id`
ORDER BY users.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`id` = marks.`id`
GROUP BY users.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = marks.`id`
ORDER BY users.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer` FROM marks 
LEFT JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`id` = marks.`id`
GROUP BY users.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`computer` FROM marks 
LEFT JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`computer`
ORDER BY users.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`computer` FROM marks 
LEFT JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`computer`
GROUP BY users.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks 
RIGHT JOIN users ON users.`firstname`
RIGHT JOIN practical ON practical.`computer`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`computer` FROM marks 
LEFT JOIN users ON users.`id`
INNER JOIN practical ON practical.`computer`;


SELECT * FROM marks LEFT JOIN users ON users.`id`;


SELECT * FROM users LEFT JOIN marks ON users.`id`;



SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`computer` FROM marks 
LEFT JOIN users ON users.`id`
INNER JOIN practical ON practical.`computer`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer` FROM marks 
LEFT JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`id` = users.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`id` = marks.`id`
ORDER BY users.`id`;



SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`id` = marks.`id`
ORDER BY users.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`id` = marks.`id`
GROUP BY users.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`	
INNER JOIN practical ON practical.`id` = users.`id`
GROUP BY users.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
LEFT JOIN practical ON practical.`id` = marks.`id`
ORDER BY users.`id`;



SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = marks.`id`
ORDER BY users.`id`;




SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
INNER JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`id` = marks.`id`
GROUP BY  marks;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`id` = marks.`id`
ORDER BY users.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id` 
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`gujrati` >= 50 ;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
INNER JOIN users ON users.`id` = marks.`id` 
INNER JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`gujrati` <= 50 ;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id` 
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 5;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id` 
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 5;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id` 
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 5;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks 
RIGHT JOIN users ON users.`id` = marks.`id`
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE practical.`id` <= 4;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
INNER JOIN users ON users.`id` = marks.`id`
INNER JOIN practical ON practical.`id` = marks.`id` 
WHERE practical.`id` >= 4;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
INNER JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 5;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id` 
RIGHT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 5;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = marks.`id`
ORDER BY users.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer` 
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = marks.`id` 
WHERE marks.`id` <= 3
ORDER BY users.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id`
LEFT JOIN practical ON practical.`id` = marks.`id`
WHERE marks.`id` <= 3
ORDER BY marks.`id`;



SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks 
RIGHT JOIN users ON users.`id` = marks.`id`
LEFT JOIN practical ON practical.`id` = marks.`id`;



SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
RIGHT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = users.`id`
WHERE marks.`maths` <= 33
ORDER BY marks.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = users.`id`
ORDER BY marks.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = users.`id`;



 SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`
   FROM users
   FULL JOIN marks
   ON marks.`id` = users.`id`;
   
   
SELECT users.`id`,users.`firstname`,users.`lastname`,users.`gender`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
FULL JOIN users ON users.`id` = marks.`id`;


SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`current_date`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = users.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer` FROM marks
LEFT JOIN users ON users.`id` = marks.`id`
LEFT JOIN practical ON practical.`id` = users.`id`;

SELECT users.`id`,users.`firstname`,users.`lastname`,users.`email`,users.`gender`,marks.`id`,marks.`gk`,marks.`gujrati`,marks.`hindi`,marks.`maths`,marks.`sanskrit`,marks.`science`,marks.`social science`,practical.`id`,practical.`computer`
FROM marks 
LEFT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = users.`id`;

SELECT users.`id`,
		users.`firstname`,
		users.`lastname`,
		users.`gender`,
		marks.`id`,
		marks.`gk`,
		marks.`gujrati`,
		marks.`hindi`,
		marks.`maths`,
		marks.`sanskrit`,
		marks.`science`,
		marks.`social science`,
		practical.`id`,
		practical.`computer`
FROM marks 
LEFT JOIN users ON users.`id` = marks.`id`
RIGHT JOIN practical ON practical.`id` = users.`id`;




SELECT users.`id`,
		users.`firstname`,
		users.`lastname`,
		users.`gender`,
		marks.`id`,
		marks.`gk`,
		marks.`gujrati`,
		marks.`hindi`,
		marks.`maths`,
		marks.`sanskrit`,
		marks.`science`,
		marks.`social science`
FROM marks 
RIGHT JOIN users ON users.`id` = marks.`id`;

SELECT users.`id`,
		users.`firstname`,
		users.`lastname`,
		users.`gender`,
		users.`current_date`,
		marks.`id`,
		marks.`gk`,
		marks.`gujrati`,
		marks.`hindi`,
		marks.`maths`,
		marks.`sanskrit`,
		marks.`science`,
		marks.`social science`
FROM marks
LEFT JOIN users ON users.`id` = marks.`id`;


 -->









<!--[select a records from table] SELECT firstname, lastname, email FROM users; -->

<!--[where select a records] SELECT * FROM users WHERE id = 1; -->

<!-- [filter email in tables] SELECT * FROM users WHERE email = 'dharminmakrubiya@hotmail.com';-->

<!-- [Record order by ASE & DESE]SELECT * FROM users ORDER BY firstname ASC; -->

<!--  INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `gender`) VALUES ('Dharmin,Makrubiya,dharminmakrubiya18@gmail.com,1111,male')-->

<!--[finding a null value in to the table] SELECT firstname, lastname, gender FROM users WHERE email IS NULL; -->

<!-- [Linit Only Show limited records into the database]SELECT * FROM users LIMIT 3; -->

<!-- SELECT MIN(Price) AS SmallestPrice FROM users; -->

<!--[counting a total id's into the database table] SELECT COUNT(id) FROM users; -->

<!-- [counting total average of table records]SELECT AVG(price) FROM users; -->

<!--[searching records from a] SELECT * FROM users WHERE firstname LIKE 'a%'; d% etc-->

<!--[Searching records from carectors wise] SELECT * FROM users WHERE lastname LIKE 'mak%'; -->

<!--[operator is a shorthand for multiple OR conditions] SELECT * FROM users WHERE firstname IN ('dharmin'); -->

<!--[Between Operator] SELECT * FROM users WHERE id BETWEEN 1 AND 5; -->

<!-- [column  temporary name] SELECT id AS id, firstname AS dharmin FROM users;-->

<!-- [inner join] SELECT users.id, marks.maths FROM users INNER JOIN marks ON users.id =marks.id;-->

<!-- [left join] SELECT users.firstname, marks.id FROM users LEFT JOIN marks ON users.id = marks.id ORDER BY users.firstname; -->

<!-- [Right join] SELECT users.firstname,users.lastname,users.id, marks.id,marks.maths FROM marks RIGHT JOIN users ON users.id = marks.id ORDER BY users.firstname; -->

<!-- [Full join returns all records when there is a match in table1 and table2] -->

<!-- [Self Join that it is a join between two copies of the same table] SELECT a.firstname, b.maths FROM users a, marks b WHERE a.firstname < b.id; -->

<!-- [UNION] SELECT firstname FROM users UNION SELECT firstname FROM users ORDER BY firstname;  -->

<!-- [Group By] SELECT COUNT(id), firstname FROM users GROUP BY firstname;-->

<!-- [The EXISTS operator is used to test for the existence of any record in a subquery.] -->

<!-- [any returns TRUE if ANY of the subquery values meet the condition] SELECT firstname FROM users WHERE id = ANY (SELECT id FROM marks WHERE maths < 40); -->

<!--[Alias temporary changed columns name] SELECT id AS USERSID, firstname AS USERSNAME FROM users; -->

<!-- The HAVING clause was added to SQL because the WHERE keyword cannot be used with aggregate functions. -->
<!-- SELECT COUNT(id),firstname FROM users GROUP BY firstname HAVING COUNT(id) < 5; -->

<!-- [SELECT INTO statement copies data from one table into a new table.]-->
<!-- SELECT * INTO users FROM new_users; -->

<!-- [INSERT INTO SELECT statement copies data from one table and inserts it into another table.] -->
<!-- INSERT INTO users (firstname,lastname) SELECT user_name, user_last_name FROM new_users;
     INSERT INTO users (firstname,lastname) SELECT user_name, user_last_name , user_email FROM new_users;
-->


<!-- Primary key AUTO_INCREMENT -->
<!-- there can be only one auto column and it -->

<!-- Index Key -->
<!-- Indexes are used to retrieve data from the database more quickly than otherwise. -->

<!-- Foreign Key  -->
<!-- Foreign key are used one table column data to pass another table in to the database -->

<!-- Auto Increment -->
<!-- Auto-increment allows a unique number to be generated automatically when a new record is inserted into a table. -->

<!-- SQL Constraints -->
<!-- SQL constraints are used to specify rules for the data in a table. -->

<!-- SHOW TABLES -->
<!-- SHOW TABLES; SQL Query are show the all tables show into the one database -->

<!-- SHOW FULL TABLES; -->
<!-- Show Table Type Like Basetable ANd View -->


<!-- VIEW STATEMENT -->
<!-- VIEW is virtual table based on the result-set of an SQL statement. -->
<!--[Example] CREATE VIEW productOrderCode AS SELECT productCode , orderNumber FROM orderDetails; -->

<!-- Create and Replace VIEW Statements Example -->
<!-- CREATE OR REPLACE VIEW productOrderCode AS SELECT productCode , orderNumber, priceEach FROM orderDetails; -->

<!-- 
SELECT * FROM bigsalesorder;
SELECT * FROM saleperorder;
SELECT * FROM productordercode;
SELECT * FROM bigsalesorder;
CREATE OR REPLACE VIEW productOrderCode AS SELECT productCode , orderNumber, priceEach FROM orderDetails;

CREATE OR REPLACE VIEW productordercode
AS SELECT productCode,orderNumber,priceEach,orderLineNumber
FROM orderDetails;

CREATE OR REPLACE VIEW productordercode
AS SELECT productCode,orderNumber,priceEach,orderLineNumber,quantityOrdered
FROM orderDetails;

CREATE OR REPLACE VIEW bigsalesorder
AS SELECT orderNumber
FROM orderDetails;

SELECT * FROM productordercode;

///////
SELECT * FROM bigsalesorder;
SELECT * FROM productordercode;
SELECT * FROM saleperorder;

CREATE OR REPLACE VIEW saleperorder AS
SELECT orderNumber,productCode,quantityOrdered,priceEach,orderLineNumber
FROM orderDetails;

CREATE OR REPLACE VIEW productordercode AS
SELECT orderNumber,productCode,quantityOrdered,priceEach,orderLineNumber
FROM orderDetails;

CREATE OR REPLACE VIEW productOrderCode AS SELECT productCode , orderNumber, priceEach FROM orderDetails;

CREATE OR REPLACE VIEW productordercode
AS SELECT productCode,orderNumber,priceEach,orderLineNumber
FROM orderDetails;

CREATE OR REPLACE VIEW productordercode
AS SELECT productCode,orderNumber,priceEach,orderLineNumber,quantityOrdered
FROM orderDetails;

CREATE OR REPLACE VIEW bigsalesorder
AS SELECT orderNumber
FROM orderDetails; 

SELECT * FROM productordercode;
-->

<!-- Inner Join is a selects records that have matching values in both tables-->
<!-- SELECT users.firstname, users.lastname ,users.email ,marks.hindi,marks.gujrati
FROM users
INNER JOIN marks ON users.id = marks.id; -->



<!-- Left Join returns all records from the left table record not match then return a null value in the table records -->
<!-- SELECT users.firstname,users.lastname, marks.id,marks.maths
FROM marks
LEFT JOIN users ON users.id = marks.id
ORDER BY users.firstname; -->



<!-- Right Join returns all records from the right table record not match then return a null value in the table records -->
<!-- SELECT users.firstname,users.lastname,users.id, marks.id,marks.maths
FROM marks
RIGHT JOIN users ON users.id = marks.id
ORDER BY users.firstname; -->

<!-- 
SELECT employee_id , employee_first_name , employee_last_name,employee_email
FROM employee;

SELECT employee_id "Employee Id", employee_first_name AS EmployeeNames FROM employee;

SELECT CONCAT(employee_first_name,', ',employee_last_name) AS fullname
FROM employee;

SELECT employee_first_name,employee_email FROM employee ORDER BY employee_current_date DESC;

SELECT employee_position, AVG(employee_salary) FROM employee GROUP BY employee_email ORDER BY 2;
 
SELECT employee_salary+employee_bonus  AS EMPLOYEE_TOTAL_PAY FROM employee ORDER BY EMPLOYEE_TOTAL_PAY;

SELECT employee_first_name, employee_salary > 12000 FROM employee;

SELECT employee_email, employee_salary+employee_bonus  AS EMPLOYEE_TOTAL_PAY FROM employee ORDER BY EMPLOYEE_TOTAL_PAY;

SELECT employee_first_name,employee_last_name,employee_email
FROM employee
WHERE employee_marital_status ='married';

SELECT employee_id,employee_first_name,employee_last_name
FROM employee
WHERE employee_id <= 5;

SELECT employee_id,employee_first_name,employee_last_name,employee_email
FROM employee
WHERE employee_id >= 5;

SELECT employee_id , employee_first_name , employee_last_name,employee_email
FROM employee;

SELECT employee_id "Employee Id", employee_first_name AS EmployeeNames FROM employee;

SELECT CONCAT(employee_first_name,', ',employee_last_name) AS fullname
FROM employee;

SELECT employee_first_name,employee_email FROM employee ORDER BY employee_current_date DESC;

SELECT employee_position, AVG(employee_salary) FROM employee GROUP BY employee_email ORDER BY 2;
 
SELECT employee_salary+employee_bonus  AS EMPLOYEE_TOTAL_PAY FROM employee ORDER BY EMPLOYEE_TOTAL_PAY;

SELECT employee_first_name, employee_salary > 12000 FROM employee;

SELECT employee_email, employee_salary+employee_bonus  AS EMPLOYEE_TOTAL_PAY FROM employee ORDER BY EMPLOYEE_TOTAL_PAY;


SELECT employee_id,employee_first_name,employee_last_name,employee_email,employee_date_of_birth,employee_gender,employee_nationality,employee_religion,employee_marital_status,employee_phone_number,employee_address,employee_city,employee_position,employee_salary,employee_bonus,employee_current_date 
FROM employee 
WHERE employee_salary >= 40000 AND employee_marital_status='married' 
AND employee_city='ahmedabad'AND employee_gender='Male'
AND employee_religion='Hindu'AND employee_city='Ahmedabad'
 OR employee_address ='Ahmedabad' GROUP BY employee_first_name;
 

 SELECT employee_first_name, employee_gender, COUNT(*) FROM employee
       WHERE employee_gender = 'male' OR employee_religion='hindu'
       GROUP BY employee_first_name,employee_gender;

SELECT employee_first_name,employee_last_name,employee_email
FROM employee
WHERE employee_marital_status ='married';

SELECT employee_id,employee_first_name,employee_last_name
FROM employee
WHERE employee_id <= 5;

SELECT employee_id,employee_first_name,employee_last_name,employee_email
FROM employee
WHERE employee_id >= 5;

SELECT employee_email,employee_salary+employee_bonus AS EMPLOYEE_TOTAL_PAY FROM employee;

SELECT * FROM employee
LIMIT 3;

SELECT 
    employee_city,
    COUNT(*) 
FROM employee
GROUP BY employee_city;


SELECT employee_id,employee_first_name,employee_last_name,employee_email,employee_date_of_birth,employee_gender,employee_nationality,employee_religion,employee_marital_status,employee_phone_number,employee_address,employee_city,employee_position,employee_salary,employee_bonus,employee_current_date FROM employee WHERE employee_salary >= 40000 AND employee_marital_status='married' AND employee_city='ahmedabad'AND
employee_gender='Male'; 

SELECT employee_id,employee_first_name,employee_last_name,employee_email,employee_date_of_birth,employee_gender,employee_nationality,employee_religion,employee_marital_status,employee_phone_number,employee_address,employee_city,employee_position,employee_salary,employee_bonus,employee_current_date 
FROM employee 
WHERE employee_salary >= 40000 
AND employee_marital_status='married' 
AND employee_city='ahmedabad'
AND employee_gender='Male'
AND employee_religion='Hindu'
AND employee_city='Ahmedabad'
OR employee_address ='Ahmedabad'
AND employee_bonus >= 1000;


SELECT employee_id,employee_first_name,employee_last_name,employee_email,employee_date_of_birth,employee_gender,employee_nationality,employee_religion,employee_marital_status,employee_phone_number,employee_address,employee_city,employee_position,employee_salary,employee_bonus,employee_current_date 
FROM employee 
WHERE employee_salary >= 100000 
AND employee_city='ahmedabad'
AND employee_gender='Male'
AND employee_religion='Hindu'
AND employee_marital_status='married' 
OR employee_address ='Ahmedabad';



SELECT employee_first_name,employee_date_of_birth , YEAR(CURRENT_DATE()) - YEAR(employee_date_of_birth) AS EmployeeAge fROM employee;



SELECT employee_id, employee_first_name, employee_last_name, employee_city,employee_salary
FROM employee
GROUP BY employee_id
HAVING employee_id <= 5;

SELECT employee_first_name,employee_last_name,employee_email,employee_marital_status,employee_city, COUNT(*) FROM employee WHERE employee_city='Ahmedabad' AND employee_marital_status='married' AND employee_salary BETWEEN 50000 AND 90000 GROUP BY employee_city;

SELECT employee_first_name,employee_last_name,employee_email,employee_marital_status,employee_city, COUNT(*) FROM employee GROUP BY employee_city;

SELECT employee_first_name,employee_last_name,employee_email,employee_marital_status,employee_city, COUNT(*) FROM employee WHERE employee_city='Ahmedabad' AND employee_marital_status='married' AND employee_salary BETWEEN 50000 AND 90000 GROUP BY employee_city;



 -->

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

    <!-- <script>
        
        function checkEmail() {
            var email = document.getElementById('txtEmail').value;

            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (!filter.test(email.value)) {
                alert('Please provide a valid email address');
                email.focus;
                return false;
            }
            if (email == "") {
                alert("Please provide a email address.");
            }
        }



        function checkPassword() {
            var password = document.getElementById('txtPaswword');
            var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

            if (!filter.test(password.value)) {
                alert('Please provide a valid password');
                email.focus;
                return false;
            }
        }
    </script> -->

</head>

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
                                <h3 class="mb-5 text-uppercase">Student registration form</h3>

                                <form method="POST" action="">
                                    <div class="form-outline mb-4">
                                        <input type="text" name="firstname" class="form-control form-control-lg" required>
                                        <label class="form-label" for="form3Example9">First Name</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="lastname" class="form-control form-control-lg" required>
                                        <label class="form-label" for="form3Example90">Last Name</label>
                                    </div>


                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" id="txtEmail" class="form-control form-control-lg" required>
                                        <label class="form-label" for="form3Example97">Email ID</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" id="txtPaswword" class="form-control form-control-lg" required>
                                        <label class="form-label" for="form3Example99">Password</label>
                                    </div>

                                    <h6 class="mb-0 me-4">Gender: </h6>

                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input type="radio" name="gender" value="Female" class="form-check-input">Female

                                    </              div>

                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input type="radio" name="gender" value="Male" class="form-check-input">Male

                                    </div>

                                    <div class="d-flex justify-content-end pt-3">
                                        <input type="submit" name="submit" value="submit" onclick="checkEmail()" class="btn btn-warning btn-lg ms-2">
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