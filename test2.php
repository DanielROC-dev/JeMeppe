<?php
if(isset($_POST['id']))
{
    $conn = mysqli_connect("localhost", "root", "", "mydb");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $conn->query("SET FOREIGN_KEY_CHECKS=0");
    $id = $_POST['id'];
    $delete_voorzieningen = "DELETE FROM voorzieningen WHERE id = (SELECT voorzieningen_id FROM kamervoorz WHERE kamer_id = $id)";
    $delete_kamervoorz = "DELETE FROM kamervoorz WHERE kamer_id = $id";
    $delete_kamer = "DELETE FROM kamer WHERE id = $id";
    

    if (mysqli_query($conn, $delete_voorzieningen) && mysqli_query($conn, $delete_kamer) && mysqli_query($conn, $delete_kamervoorz)) {
        echo 'success';
    } else {
        echo mysqli_error($conn);
    }
    $conn->query("SET FOREIGN_KEY_CHECKS=1");

    mysqli_close($conn);
}
?>
