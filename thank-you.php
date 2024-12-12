<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            align-items: center;
            padding: 50px;
            background-color: yellow;
            color: #333;
        }
        h1{
            padding: 50px;
        }
        .message {
            font-size: 20px;
            margin-top: 20px;
            padding: 30px;
        }
        .details {
            font-size: 18px;
            margin-top: 20px;
            text-align: center;
            padding: 20px;
        }
        div{
            background-color:white;
            align-items: center;
            align-self: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div>
    <h1>Registration Successful!</h1>
    <p class="message">Thank you for registering your SIM card with us.</p>
    <div class="gif">
        <img src="tick.gif" alt="Success" width="100" height="100">
    </div>

    
    <?php
    if (isset($_GET['fullName']) && isset($_GET['gender']) && isset($_GET['email']) && isset($_GET['phone']) && isset($_GET['aadharNumber'])) {
        // Retrieve data from the query string
        $fullName = htmlspecialchars($_GET['fullName']);
        $gender = htmlspecialchars($_GET['gender']);
        $email = htmlspecialchars($_GET['email']);
        $phone = htmlspecialchars($_GET['phone']);
        $aadharNumber = htmlspecialchars($_GET['aadharNumber']);
        
        // Display the user's details
        echo "<div class='details'>";
        echo "<p><strong>Name:</strong> $fullName</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Phone Number:</strong> $phone</p>";
        echo "<p><strong>Aadhar Number:</strong> $aadharNumber</p>";
        echo "</div>";
    } else {
        // If no data is passed, display an error message
        echo "<p>Sorry, we couldn't retrieve your registration details.</p>";
    }
    ?>
    </div>
</body>
</html>
