<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";

    $conn = mysqli_connect("$servername", "$username", "$password", "$dbname");
    $id = $_GET['id'];
    // Delete the row with the specified id from the "kamer" table
    $sql = "DELETE FROM kamer WHERE id=$id";
    mysqli_query($conn, $sql);

    // Redirect to the index page
    header("Location:index2.php");
?>