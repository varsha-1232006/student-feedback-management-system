<?php

session_start();

include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql =
        "SELECT * FROM students
         WHERE email = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $email);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $student =
            $result->fetch_assoc();

        if (
            password_verify(
                $password,
                $student["password"]
            )
        ) {

            $_SESSION["student_id"] =
                $student["id"];

            $_SESSION["student_name"] =
                $student["name"];

            header(
                "Location: dashboard.php"
            );

            exit();

        } else {

            $message =
                "Invalid password.";
        }

    } else {

        $message =
            "Student account not found.";
    }
}

?>

<!DOCTYPE html>

<html>

<head>

<title>Student Login</title>

<link rel="stylesheet"
      href="css/style.css">

</head>

<body>

<div class="form-container">

<h2>Student Login</h2>

<p><?php echo $message; ?></p>

<form method="POST">

<div class="form-group">

<label>Email</label>

<input type="email"
       name="email"
       required>

</div>


<div class="form-group">

<label>Password</label>

<input type="password"
       name="password"
       required>

</div>


<button type="submit">
Login
</button>

</form>

</div>

</body>

</html>