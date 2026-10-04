<?php

session_start();

include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username =
        $_POST["username"];

    $password =
        $_POST["password"];


    $sql =
        "SELECT * FROM admin
         WHERE username = ?
         AND password = ?";


    $stmt =
        $conn->prepare($sql);

    $stmt->bind_param(
        "ss",
        $username,
        $password
    );

    $stmt->execute();

    $result =
        $stmt->get_result();


    if ($result->num_rows == 1) {

        $_SESSION["admin"] =
            $username;

        header(
            "Location: admin_dashboard.php"
        );

        exit();

    } else {

        $message =
            "Invalid admin credentials.";
    }
}

?>

<!DOCTYPE html>

<html>

<head>

<title>Admin Login</title>

<link rel="stylesheet"
      href="css/style.css">

</head>

<body>

<div class="form-container">

<h2>
Admin Login
</h2>

<p>
<?php echo $message; ?>
</p>

<form method="POST">

<div class="form-group">

<label>
Username
</label>

<input type="text"
       name="username"
       required>

</div>


<div class="form-group">

<label>
Password
</label>

<input type="password"
       name="password"
       required>

</div>


<button type="submit">
Admin Login
</button>

</form>

</div>

</body>

</html>