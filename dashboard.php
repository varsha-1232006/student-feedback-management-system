<?php

session_start();

if (!isset($_SESSION["student_id"])) {

    header("Location: login.php");

    exit();
}

?>

<!DOCTYPE html>

<html>

<head>

<title>Student Dashboard</title>

<link rel="stylesheet"
      href="css/style.css">

</head>

<body>

<nav>

<h2>
Student Feedback System
</h2>

<div>

<a href="dashboard.php">
Dashboard
</a>

<a href="feedback.php">
Give Feedback
</a>

<a href="my_feedback.php">
My Feedback
</a>

<a href="logout.php">
Logout
</a>

</div>

</nav>


<div class="dashboard">

<h1>

Welcome,
<?php echo $_SESSION["student_name"]; ?>

</h1>


<section class="features">

<div class="card">

<h3>
Submit Feedback
</h3>

<p>
Provide ratings and comments
about your faculty.
</p>

<br>

<a href="feedback.php"
   class="btn">

Give Feedback

</a>

</div>


<div class="card">

<h3>
My Feedback
</h3>

<p>
View your previously submitted
feedback.
</p>

<br>

<a href="my_feedback.php"
   class="btn">

View Feedback

</a>

</div>

</section>

</div>

</body>

</html>