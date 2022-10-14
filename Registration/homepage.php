<?php
    session_start();

    include "db.php";
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
?>
<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>User Login</title>
</head>

<body>

    <?php
        if ($_SESSION["name"]) {
    ?>
        Welcome <?php echo $_SESSION["name"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.</a>
    <?php
        } 
        else 
        {
            echo "<h1>Please login first .</h1>";
        }
    ?>
    <div class="container">
        <h2>users</h2>
        <table class="table">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Courses</th>
                    <th>Year</th>
                    <th>Gender</th>
                    <th>hobbies</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>  
                <!-- <?php echo "Hello"; ?> -->
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['user_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['course']; ?></td>
                            <td><?php echo $row['year']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['hobbies']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            
                            <td>
                                <a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                <?php       }
                }
                ?>
            </tbody>
        </table>
    </div>



</body>