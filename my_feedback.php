<?php

session_start();

include "db.php";

if (!isset($_SESSION["student_id"])) {

    header("Location: login.php");

    exit();
}

$student_id =
    $_SESSION["student_id"];


$sql = "SELECT *
        FROM feedback
        WHERE student_id = ?
        ORDER BY submitted_at DESC";


$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "i",
    $student_id
);

$stmt->execute();

$result =
    $stmt->get_result();

?>

<!DOCTYPE html>

<html>

<head>

<title>My Feedback</title>

<link rel="stylesheet"
      href="css/style.css">

</head>

<body>

<div class="dashboard">

<h1>
My Submitted Feedback
</h1>


<table>

<tr>

<th>Faculty</th>

<th>Subject</th>

<th>Teaching</th>

<th>Communication</th>

<th>Knowledge</th>

<th>Interaction</th>

<th>Overall</th>

<th>Comments</th>

</tr>


<?php

while (
    $row = $result->fetch_assoc()
) {

?>

<tr>

<td>
<?php echo $row["faculty_name"]; ?>
</td>

<td>
<?php echo $row["subject"]; ?>
</td>

<td>
<?php echo $row["teaching_quality"]; ?>
</td>

<td>
<?php echo $row["communication"]; ?>
</td>

<td>
<?php echo $row["subject_knowledge"]; ?>
</td>

<td>
<?php echo $row["interaction"]; ?>
</td>

<td>
<?php echo $row["overall_rating"]; ?>
</td>

<td>
<?php echo $row["comments"]; ?>
</td>

</tr>

<?php

}

?>

</table>

<br>

<a href="dashboard.php"
   class="btn">

Back to Dashboard

</a>

</div>

</body>

</html>