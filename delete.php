<?php
if ($_POST['action'] === 'delete') {
  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "mydb";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Delete data from the link table
  $linkTable = "kamervoorz";
  $deleteLinkTable = "DELETE FROM " . $linkTable;
  if ($conn->query($deleteLinkTable) === TRUE) {
    echo "Data deleted from the link table successfully";
  } else {
    echo "Error deleting data from the link table: " . $conn->error;
  }

  // Delete data from the first table
  $firstTable = "kamer";
  $deleteFirstTable = "DELETE FROM " + $firstTable;
  if ($conn->query($deleteFirstTable) === TRUE) {
    echo "Data deleted from the first table successfully";
  } else {
    echo "Error deleting data from the first table: " . $conn->error;
  }

  // Delete data from the second table
  $secondTable = "second_table_name";
  $deleteSecondTable = "DELETE FROM " + $secondTable;
  if ($conn->query($deleteSecondTable) === TRUE) {
    echo "Data deleted from the second table successfully";
  } else {
    echo "Error deleting data from the second table: " . $conn->error;
  }

  $conn->close();
}
?>
?>