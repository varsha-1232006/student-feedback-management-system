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

<title>Student Feedback</title>

<link rel="stylesheet"
      href="css/style.css">

</head>

<body>

<div class="form-container">

<h2>
Student Feedback Form
</h2>

<form method="POST"
      action="submit_feedback.php">


<div class="form-group">

<label>
Faculty Name
</label>

<input type="text"
       name="faculty_name"
       required>

</div>


<div class="form-group">

<label>
Subject
</label>

<input type="text"
       name="subject"
       required>

</div>


<div class="form-group">

<label>
Teaching Quality
</label>

<select name="teaching_quality"
        required>

<option value="">
Select Rating
</option>

<option value="1">
1 - Poor
</option>

<option value="2">
2 - Fair
</option>

<option value="3">
3 - Good
</option>

<option value="4">
4 - Very Good
</option>

<option value="5">
5 - Excellent
</option>

</select>

</div>


<div class="form-group">

<label>
Communication
</label>

<select name="communication"
        required>

<option value="">
Select Rating
</option>

<option value="1">1 - Poor</option>
<option value="2">2 - Fair</option>
<option value="3">3 - Good</option>
<option value="4">4 - Very Good</option>
<option value="5">5 - Excellent</option>

</select>

</div>


<div class="form-group">

<label>
Subject Knowledge
</label>

<select name="subject_knowledge"
        required>

<option value="">
Select Rating
</option>

<option value="1">1 - Poor</option>
<option value="2">2 - Fair</option>
<option value="3">3 - Good</option>
<option value="4">4 - Very Good</option>
<option value="5">5 - Excellent</option>

</select>

</div>


<div class="form-group">

<label>
Interaction
</label>

<select name="interaction"
        required>

<option value="">
Select Rating
</option>

<option value="1">1 - Poor</option>
<option value="2">2 - Fair</option>
<option value="3">3 - Good</option>
<option value="4">4 - Very Good</option>
<option value="5">5 - Excellent</option>

</select>

</div>


<div class="form-group">

<label>
Overall Rating
</label>

<select name="overall_rating"
        required>

<option value="">
Select Rating
</option>

<option value="1">1 - Poor</option>
<option value="2">2 - Fair</option>
<option value="3">3 - Good</option>
<option value="4">4 - Very Good</option>
<option value="5">5 - Excellent</option>

</select>

</div>


<div class="form-group">

<label>
Comments
</label>

<textarea
name="comments"
placeholder="Enter your feedback">
</textarea>

</div>


<button type="submit">
Submit Feedback
</button>

</form>

</div>

</body>

</html>