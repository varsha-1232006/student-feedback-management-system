<?php

session_start();

include "db.php";

if (!isset($_SESSION["admin"])) {

    header(
        "Location: admin_login.php"
    );

    exit();
}


$id = $_GET["id"];


$sql =
    "DELETE FROM feedback
     WHERE id = ?";


$stmt =
    $conn->prepare($sql);

$stmt->bind_param(
    "i",
    $id
);

$stmt->execute();


header(
    "Location: admin_dashboard.php"
);

exit();

?>