<?php

session_start();

include "db.php";

if (!isset($_SESSION["admin"])) {

    header(
        "Location: admin_login.php"
    );

    exit();
}


$sql = "SELECT
        feedback.*,
        students.name,
        students.email,
        students.department
        FROM feedback
        JOIN students
        ON feedback.student_id = students.id
        ORDER BY feedback.submitted_at DESC";


$result =
    $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

<title>Admin Dashboard</title>

<link rel="stylesheet"
      href="css/style.css">

</head>

<body>

<nav>

<h2>
Admin Dashboard
</h2>

<a href="admin_logout.php">
Logout
</a>

</nav>


<div class="dashboard">

<h1>
Student Feedback Records
</h1>


<table>

<tr>

<th>Student</th>

<th>Email</th>

<th>Department</th>

<th>Faculty</th>

<th>Subject</th>

<th>Overall Rating</th>

<th>Comments</th>

<th>Action</th>

</tr>


<?php

while (
    $row = $result->fetch_assoc()
) {

?>

<tr>

<td>
<?php echo $row["name"]; ?>
</td>

<td>
<?php echo $row["email"]; ?>
</td>

<td>
<?php echo $row["department"]; ?>
</td>

<td>
<?php echo $row["faculty_name"]; ?>
</td>

<td>
<?php echo $row["subject"]; ?>
</td>

<td>
<?php echo $row["overall_rating"]; ?>/5
</td>

<td>
<?php echo $row["comments"]; ?>
</td>

<td>

<a
href="delete_feedback.php?id=<?php echo $row["id"]; ?>"
onclick="return confirmDelete();">

Delete

</a>

</td>

</tr>

<?php

}

?>

</table>

</div>

<script src="js/script.js"></script>

</body>

</html>