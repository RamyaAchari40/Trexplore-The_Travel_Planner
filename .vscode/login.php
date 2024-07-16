<?php
include 'config.php';
session_start();

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE email = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
    mysqli_stmt_execute($stmt);

    // Check for successful execution of the query
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        header('location: home.php');
        exit();
    } else {
        $message = 'Incorrect Email or Password!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your head content here -->
</head>

<body style="background-color: red;">
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Login now</h3>

            <?php
            if (isset($message)) {
                echo '<div class="message">' . $message . '</div>';
            }
            ?>

            <div class="input-group mb-3">
                <span class="input-group-text fa-envelope"></span>
                <input type="email" name="email" placeholder="Enter email" class="form-control box" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text fa-lock"></span>
                <input type="password" name="password" placeholder="Enter password" class="form-control box" required>
            </div>

            <input type="submit" name="submit" value="Login now" class="btn">

            <p>Don't have an account? <a href="register.php">Register now</a></p>
        </form>
    </div>

    <!-- Include FontAwesome script -->
    <script src="https://kit.fontawesome.com/YOUR_ICON_KIT_ID.js" crossorigin="anonymous"></script>
</body>

</html>
