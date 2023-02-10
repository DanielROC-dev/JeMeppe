<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="room-page">
  <nav>
      <a href="index.php">Home</a>
      <a href="rooms.php">Rooms</a>
      <a href="about.php">About</a>
      <a href="contact.php">Contact</a>
    </nav>
    <!-- Add a header for the website -->
    <header>
      <h1>Rooms</h1>
      
    </header>
    
    <article>
    <div style="padding-left:16px">
    
    </div>
    <!-- Add the main content area -->
    <div class="main-content">
      <!-- Add a card for each room -->
      <div class="room-card">
        <div class="room-info">
          <div class="room-type">Standard Room</div>
          <div class="room-price">$100/night</div>
          <button class="book-button">Book Now</button>
        </div>
      </div>
      <!-- Add another card for another room -->
      <div class="room-card">
        <div class="room-info">
          <div class="room-type">Deluxe Room</div>
          <div class="room-price">$150/night</div>
          <button class="book-button">Book Now</button>
        </div>
      </div>
    	

      <?php
for ($x = 0; $x <= 10; $x++) {
  echo '<div class="room-card">
   <div class="room-info">
    <div class="room-type">Deluxe Room</div>
    <div class="room-price">$150/night</div>
    <button class="book-button">Book Now</button>
  </div>
</div>';
}
?>

    </div>
    </article>
    <footer>
        <p>Copyright &copy; 2023 My Hotel</p>
    </footer>
  </body>
</html>