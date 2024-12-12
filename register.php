<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sim_registration";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullName = $_POST['fullName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $aadharNumber = $_POST['aadharNumber'];

    // Check if the user is already registered
    $sql = "SELECT * FROM users WHERE email = '$email' OR phone = '$phone' OR aadharNumber = '$aadharNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User already registered
        header("Location: already-registered.html");
        exit();  // Make sure to stop further code execution
    } else {
        // Insert user data into the database
        $sql = "INSERT INTO users (fullName, gender, email, phone, aadharNumber) VALUES ('$fullName', '$gender', '$email', '$phone', '$aadharNumber')";
        
        if ($conn->query($sql) === TRUE) {
            // Redirect to the thank-you page with query parameters
            header("Location: thank-you.php?fullName=$fullName&gender=$gender&email=$email&phone=$phone&aadharNumber=$aadharNumber");
            exit();  // Make sure to stop further code execution
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
