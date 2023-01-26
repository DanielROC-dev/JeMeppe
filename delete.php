<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";

    $conn = mysqli_connect("$servername", "$username", "$password", "$dbname");
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM kamer WHERE id=$id");
    mysqli_query($conn, "DELETE FROM voorzieningen WHERE id=$id");
    mysqli_query($conn, "DELETE FROM kamervoorz WHERE id=$id");
    mysqli_close($conn);
    header("location:index2.php");
?>