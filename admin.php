<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $roomname = $_POST['roomname'];
    $price = $_POST['price'];
    $description = $_POST["description"];
    $quantity = $_POST["quantity"];
    
    // check checkboxes
    if (isset($_POST['wc'])) {
        $wc = true;
    } else $wc = false;

    if (isset($_POST['shower'])) {
        $shower = true;
    } else $shower = false;

    if (isset($_POST['sink'])) {
        $sink = true;
    } else $sink = false;
    

    // Validate form data
    if (empty($roomname) || empty($price) || empty($description) || empty($quantity)) 
    {
        echo "Please fill out all the fields.";
    } else{
        // Database information
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydb";

        // Database names
        $room_db = "kamer";
        $name_db = "naam";
        $price_db = "prijs";
        $description_db = "beschrijving";

        $services_db = "voorzieningen";
        $quantity_db = "aantalpersonen";
        $wc_db = "wc";
        $shower_db = "douche";
        $sink_db = "wastafel";

        $roomservices_db = "kamervoorz";
        $roomservices_room_db = "kamer_id";
        $roomservices_services_db = "voorzieningen_id";
        


        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        


        
        // Insert room info
        $sql = 
        "INSERT INTO $room_db ($name_db, $price_db, $description_db) VALUES ('$roomname', '$price' , '$description')";
        mysqli_query($conn, $sql);

       // Insert additional services info
        $sql = 
        "INSERT INTO $services_db ($quantity_db, $wc_db, $shower_db, $sink_db) VALUES ('$quantity', '$wc', '$shower', '$sink'); ";
        mysqli_query($conn, $sql);


       

        // Insert ids that connects room and services info
        $sql = "INSERT INTO $roomservices_db ($roomservices_room_db, $roomservices_services_db) 
        SELECT (SELECT id FROM $room_db ORDER BY id DESC LIMIT 1),
        (SELECT id FROM $services_db ORDER BY id DESC LIMIT 1); ";
        
        
        mysqli_query($conn, $sql);

       
        echo "Kamer succesvol toegevoegt!";
    }

   
}

    

?>