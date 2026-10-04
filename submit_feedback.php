<?php

session_start();

include "db.php";

if (!isset($_SESSION["student_id"])) {

    header("Location: login.php");

    exit();
}

$student_id =
    $_SESSION["student_id"];

$faculty_name =
    $_POST["faculty_name"];

$subject =
    $_POST["subject"];

$teaching_quality =
    $_POST["teaching_quality"];

$communication =
    $_POST["communication"];

$subject_knowledge =
    $_POST["subject_knowledge"];

$interaction =
    $_POST["interaction"];

$overall_rating =
    $_POST["overall_rating"];

$comments =
    $_POST["comments"];


$sql = "INSERT INTO feedback
(
student_id,
faculty_name,
subject,
teaching_quality,
communication,
subject_knowledge,
interaction,
overall_rating,
comments
)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "issiiiiis",
    $student_id,
    $faculty_name,
    $subject,
    $teaching_quality,
    $communication,
    $subject_knowledge,
    $interaction,
    $overall_rating,
    $comments
);


if ($stmt->execute()) {

    echo "
    <script>

    alert('Feedback submitted successfully!');

    window.location='dashboard.php';

    </script>
    ";

} else {

    echo
    "Error submitting feedback: "
    . $conn->error;
}

?>