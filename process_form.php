<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $name = htmlspecialchars(trim($name));
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(trim($message));

    if ($name && $email && $message) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "trexplore";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO messages (name, email, message) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            header("Location: success_page.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Invalid input data";
    }
}
?>
