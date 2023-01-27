<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $notes = $_POST["notes"];
    $room_name = $_POST['kamer'];
    echo $room_name;

    // Validate form data
    if (empty($start_date) || empty($end_date) || empty($name) || empty($email) || empty($tel)) 
    {
        echo "Please fill out all the fields.";
    } else{
        // Database information
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydb";

        // Database names
        $reservations = "reservering";
        $start_db = "startDatum";
        $end_db = "eindDatum";
        $guest_db = "gast";
       

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        

        // Check if the dates have already been picked
        $sql = "SELECT * FROM $reservations WHERE $start_db >= '$start_date' AND $end_db <= '$end_date'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "Sorry, those dates have already been picked. Please choose another date.";
        } else {


        
        // Insert guest info
        $sql = "INSERT INTO gast (naam, email, telefoon, notes) VALUES ('$name', '$email' , '$tel', '$notes')";
        mysqli_query($conn, $sql);

       
        // Find id of selected hotel room and save it into $room_id
        $query = "SELECT id FROM kamer WHERE naam = '$room_name'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $room_id = $row['id'];


        // Insert reservations info
        $sql = "INSERT INTO $reservations ($start_db, $end_db, gast_id, kamer_id) VALUES ('$start_date', '$end_date', LAST_INSERT_ID(), '$room_id')";
        mysqli_query($conn, $sql);

       
        echo "Reservation made successfully!";
        }
    }
}
?>