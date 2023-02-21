<style>
    .loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<?php
if(isset($_POST['roomname']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['quantity'])) {
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

        echo '<div class="loader"></div>';
        echo "Room succesfully added!  <br>  you will be redirected shortly";
        echo '<meta http-equiv="refresh" content="5;url=admin2.php" />';
    }
}
if(isset($_POST['delete_room_id']))
{
    $conn = mysqli_connect("localhost", "root", "", "mydb");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $conn->query("SET FOREIGN_KEY_CHECKS=0");
    $id = $_POST['delete_room_id'];
    $delete_voorzieningen = "DELETE FROM voorzieningen WHERE id = (SELECT voorzieningen_id FROM kamervoorz WHERE kamer_id = $id)";
    $delete_kamervoorz = "DELETE FROM kamervoorz WHERE kamer_id = $id";
    $delete_kamer = "DELETE FROM kamer WHERE id = $id";
    

    if (mysqli_query($conn, $delete_voorzieningen) && mysqli_query($conn, $delete_kamer) && mysqli_query($conn, $delete_kamervoorz)) {
        echo '<div class="loader"></div>';
        echo "Room succesfully deleted!  <br>  you will be redirected shortly";
        echo '<meta http-equiv="refresh" content="5;url=admin2.php" />';
    } else {
        echo mysqli_error($conn);
    }
    $conn->query("SET FOREIGN_KEY_CHECKS=1");

    mysqli_close($conn);
}


if(isset($_POST['delete_reservation_id']))
{
    $conn = mysqli_connect("localhost", "root", "", "mydb");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $id = $_POST['delete_reservation_id'];
    $delete_reservation = "DELETE FROM reservering WHERE id = $id";
    
    if (mysqli_query($conn, $delete_reservation)) {
        echo '<div class="loader"></div>';
        echo "Reservation succesfully deleted!  <br>  you will be redirected shortly";
        echo '<meta http-equiv="refresh" content="5;url=admin2.php" />';
    } else {
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
}


if(isset($_POST['delete_guest_id']))
{
    $conn = mysqli_connect("localhost", "root", "", "mydb");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $id = $_POST['delete_guest_id'];
    $delete_guestinfo = "DELETE FROM gast WHERE id = $id";
    
    if (mysqli_query($conn, $delete_guestinfo)) {
        echo '<div class="loader"></div>';
        echo "Guest info succesfully deleted!  <br>  you will be redirected shortly";
        echo '<meta http-equiv="refresh" content="5;url=admin2.php" />';
    } else {
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>