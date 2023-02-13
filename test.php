<!DOCTYPE html>
<html>
<head>
	<title>Edit Room and Amenity</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


    $id = 48;
    $id2 = 35;

    $sql1 = "SELECT * FROM kamer WHERE id=" . $id;
    $sql2 = "SELECT * FROM voorzieningen WHERE id=" . $id2;
    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result1) > 0 && mysqli_num_rows($result2) > 0) {
        $row1 = mysqli_fetch_assoc($result1);
        $row2 = mysqli_fetch_assoc($result2);

        if (isset($_POST['submit'])) {
            $kamernummer = $_POST['kamernummer'];
            $type = $_POST['type'];
            $naam = $_POST['naam'];
            $beschrijving = $_POST['beschrijving'];

            $sql1 = "UPDATE kamer SET kamernummer='$kamernummer', type='$type' WHERE id=" . $id;
            $sql2 = "UPDATE voorzieningen SET naam='$naam', beschrijving='$beschrijving' WHERE id=" . $id2;

            if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
                echo "Record updated successfully";
                header("Location: test.php");
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
    }

?>
<form action="test.php?id=<?php echo $id; ?>&id2=<?php echo $id2; ?>" method="post">
	Room Number: <input type="text" name="kamernummer" value="<?php echo $row1["kamernummer"]; ?>">
	Room Type: <input type="text" name="type" value="<?php echo $row1["type"]; ?>">
	Amenity Name: <input type="text" name="naam" value="<?php echo $row2["naam"]; ?>">
	Amenity Description: <input type="text" name="beschrijving" value="<?php echo $row2["beschrijving"]; ?>">
	<input type="submit" name="submit" value="Submit">
</form>