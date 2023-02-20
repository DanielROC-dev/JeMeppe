<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="room-page">
  <div class="container">
        <div class="navbar">
            <img src="img/kasteel-logo.png" class="logo">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
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
  <header></header>
  
    <article>
    <div style="padding-left:16px">
    
    </div>
    <!-- Add the main content area -->
    <div class="main-content">
      <!-- Add a card for each room
      <div class="room-card">
        <div class="room-info">
          <div class="room-type">Standard Room</div>
          <div class="room-price">$100/night</div>
          <img src="img/toilet.png"><input style="pointer-events:none "type="checkbox" checked><br>
          <img src="img/sink.png"><input style="pointer-events:none "type="checkbox" checked><br>
          <img src="img/shower.png"><input style="pointer-events:none "type="checkbox" checked><br>
          <img src="img/user.png"><p1>x 2</p1><br><br>
          <button class="book-button">Book Now</button>
          
        </div>
      </div>
       Add another card for another room 
      <div class="room-card">
        <div class="room-info">a better room
          <div class="room-type">Deluxe Room</div>
          <div class="room-price">$150/night</div>
          <button class="book-button">Book Now</button>
        </div>
      </div> -->
    	

      <?php




		// Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "mydb");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // Retrieve room descriptions and amenities from the database
    $sql = "SELECT kamer.*, voorzieningen.* FROM kamer
            INNER JOIN kamervoorz ON kamer.id = kamervoorz.kamer_id
            INNER JOIN voorzieningen ON kamervoorz.voorzieningen_id = voorzieningen.id";
    $result = mysqli_query($conn, $sql);
    
    // Check if any rooms were found
    if (mysqli_num_rows($result) > 0) {
      // Loop through each room and group its amenities
      $current_room_id = null;
      $amenities = array();
      while ($row = mysqli_fetch_assoc($result)) {
          if ($row["id"] != $current_room_id) {
              // New room found, print its description and amenities
              if (!is_null($current_room_id)) {
                  foreach ($amenities as $amenity) {
                      echo "<p1>" . $amenity . "</p1>";
                  }
                
                  echo "<form action='reserve_room.php'method='post'><input class='book-button' type='hidden' name='reserve_room' value='" . $current_room_id . "' /><input type='hidden' name='action' value='Book Now' /><button class='book-button'>Book Now</button></form>";
                  echo "</div></div>";
              }
              echo "<div class='room-card'><div class='room-info'><div class='room-type'>" . $row["naam"] . "</div>";
              echo "<div class='room-price'>" . $row['prijs'] . "/night</div>";
              $amenities = array();
              $current_room_id = $row["id"];
          }
          $amenities[] = '<p1><label><img src="img/toilet.png"><input type="checkbox" ' . ($row["wc"] == 1 ? 'checked' : '') . ' onclick="return false"> WC</label></p1><br>';
    $amenities[] = '<p1><label><img src="img/shower.png"><input type="checkbox" ' . ($row["douche"] == 1 ? 'checked' : '') . ' onclick="return false"> Shower</label></p1><br>';
    $amenities[] = '<p1><label><img src="img/sink.png"><input type="checkbox" ' . ($row["wastafel"] == 1 ? 'checked' : '') . ' onclick="return false"> Sink</label></p1><br>';
          $amenities[] = '<img src="img/user.png"><p1>x ' . $row["aantalPersonen"] . '</p1><br>';
      }
      // Print the amenities for the last room
      foreach ($amenities as $amenity) {
          echo "<p1>" . $amenity . "</p1>";
      }
      echo "<br><button class='book-button'>Book Now</button>";
      echo "</div></div>";
  } else {
      echo "<p>No rooms found.</p>";
  }
    ?>








<?php

/* Select all rows from the "kamer" table
$result = mysqli_query($conn, "SELECT * FROM kamer");
$voorzieningen = mysqli_query($conn, "SELECT * FROM kamer");
// Loop through each row in the "kamer" table
while($row = mysqli_fetch_array($result)) {      
     echo '<div class="room-card">
     <div class="room-info">
     <div class="room-type">'. $row["naam"] . '</div>
     <div class="room-price">$'. $row["prijs"]  .'/night</div>                                       '/* this break the code idk why / '
    
     <img src="img/user.png"><p1>x 2</p1><br><br>
     <button class="book-button">Book Now</button></div></div>';*

}
//close connection*/



mysqli_close($conn);
?>

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