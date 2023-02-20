<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      .index_text {
        font-size: 150%;
        text-align: center;
        padding-top: 8%;
        padding-left: 20%;
        padding-right: 20%;
      }
    </style>
    </head>
    <body class="home-page">
    <div class="container">
        <div class="navbar">
            <img src="img/kasteel-logo.png" class="logo">
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="rooms.php">Rooms</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Login</a></li>
                    <li><a href="index2.php">test site</a></li>
                </ul>
            </nav>
            <img src="img/menu.png" class="menu-icon">
        </div>
    </div>
    <!-- Add a header for the website -->
    <?php
    if(isset($_POST['reserve_room'])){
        $id = $_POST['reserve_room'];
    } else echo "no id found";

    $conn = mysqli_connect("localhost", "root", "", "mydb");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $selected_room_id = "SELECT id FROM kamer WHERE id = (SELECT kamer_id FROM kamervoorz WHERE voorzieningen_id = $id)";
    $result = mysqli_query($conn, $selected_room_id);
    while($row = mysqli_fetch_array($result)) {      
        $room_id = $row['id'];
    }
    
    ?>
    <br><br><br>
    <article>
    <div class="reservation-page">
        <form action="reservation.php" method="post">
        <h1>Reserve room: </h1> <br> <br> 
            <label for="name">Name:</label>
            <input type="text" placeholder="bas van der dijk" id="name" name="name"><br><br>

            <label for="email">Email:</label>
            <input type="email" placeholder="bvandijk@gmail.com" id="email" name="email"><br><br>

            <label>Phone Number: </label>
            <input type="tel" id="tel" placeholder="06-12345678" required name="tel" value=""><br> <br>

            <label>Notes: </label>
            <input type="text" id="notes" name="notes" placeholder="zou er een wieg op de kamer geplaats kunnen worden" size="50" value=""><br> <br>

            <label for="start_date">Start Datum:</label>
            <input type="date" id="start_date" name="start_date"><br><br>

            <label for="end_date">Eind Datum:</label>
            <input type="date" id="end_date" name="end_date"><br> <br>


            <label for="selected_room">Selected room:</label>
            
            
            <?php
            // Connect to the database
            $conn = mysqli_connect("localhost", "root", "", "mydb");

            // Select all rows from the "kamer" table
            $result = mysqli_query($conn, "SELECT naam FROM kamer WHERE id = $room_id");

            // Loop through each row in the "kamer" table
            while ($row = mysqli_fetch_array($result)) {
                echo "<input readonly id='selected_room' name='selected_room' value=\"" . htmlspecialchars($row['naam']) . "\">";
            }
            
            // Close the connection
            mysqli_close($conn);
            ?>
             <br> <br>

            <input type="submit" value="Make Reservation"> <br> <br> <br>

        </form>
    </div>
   
    </article>
    <footer>
  <div class="footer-container">
    <div class="footer-row">
      <div class="footer-column">
        <h3>contact us</h3>
        <ul>
          <li><a href="#">Het kasteel Jemeppe</a></li>
          <li><a href="#">Oude Waterlandseweg 10</a></li>
          <li><a href="#">1335 XX ALMERE</a></li>
          <li><a href="#">036-5432876</a></li>
          <li><a href="#">kasteel@jemeppe.nl</a></li>
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-twitter"></a>
          <a href="#" class="fa fa-instagram"></a> <br> <br>
          <p>Copyright &copy; 2023 Jemeppe</p>
        </ul>
      </div>
      <div class="footer-column"> 
        <ul>
            <li>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9748.534088191838!2d5.251218695093214!3d52.349863544153436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c617e69b91bc5f%3A0x5796a0a6f667b59c!2sKasteel%20Almere!5e0!3m2!1snl!2snl!4v1676048187276!5m2!1snl!2snl" width="800" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </li>
        </ul>
      </div>
      <div class="footer-column">
      
   
      
    </div>
  </div>
</footer>
  </body>
</html>