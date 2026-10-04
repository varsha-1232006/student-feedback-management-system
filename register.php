<?php

include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];

    $password =
        password_hash(
            $_POST["password"],
            PASSWORD_DEFAULT
        );

    $department = $_POST["department"];
    $year = $_POST["year"];

    $sql = "INSERT INTO students
            (name, email, password, department, year)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssssi",
        $name,
        $email,
        $password,
        $department,
        $year
    );

    if ($stmt->execute()) {

        $message =
            "Registration successful. Please login.";

    } else {

        $message =
            "Registration failed. Email may already exist.";
    }
}

?>

<!DOCTYPE html>

<html>

<head>

<title>Student Registration</title>

<link rel="stylesheet"
      href="css/style.css">

</head>

<body>

<div class="form-container">

<h2>Student Registration</h2>

<p><?php echo $message; ?></p>

<form method="POST"
      onsubmit="return validateRegistration();">

<div class="form-group">

<label>Student Name</label>

<input type="text"
       name="name"
       required>

</div>


<div class="form-group">

<label>Email</label>

<input type="email"
       name="email"
       required>

</div>


<div class="form-group">

<label>Password</label>

<input type="password"
       id="password"
       name="password"
       required>

</div>


<div class="form-group">

<label>Department</label>

<select name="department" required>

<option value="">
Select Department
</option>

<option>CSE</option>
<option>ECE</option>
<option>EEE</option>
<option>IT</option>
<option>MECH</option>
<option>CIVIL</option>

</select>

</div>


<div class="form-group">

<label>Year</label>

<select name="year" required>

<option value="">
Select Year
</option>

<option value="1">
1st Year
</option>

<option value="2">
2nd Year
</option>

<option value="3">
3rd Year
</option>

<option value="4">
4th Year
</option>

</select>

</div>


<button type="submit">
Register
</button>

</form>

</div>

<script src="js/script.js"></script>

</body>

</html>