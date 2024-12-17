<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sim_registration";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $aadharNumber = $_POST['aadharNumber'];

    $sql = "SELECT * FROM users WHERE email = '$email' OR phone = '$phone' OR aadharNumber = '$aadharNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: already-registered.html");
        exit(); 
    } else {
        $sql = "INSERT INTO users (fullName, gender, email, phone, aadharNumber) VALUES ('$fullName', '$gender', '$email', '$phone', '$aadharNumber')";
        if ($conn->query($sql) === TRUE) {
            header("Location: thank-you.php?fullName=$fullName&gender=$gender&email=$email&phone=$phone&aadharNumber=$aadharNumber");
            exit(); 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
