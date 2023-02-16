<!DOCTYPE html>
<?php 

// Connect to the MySQL database
$conn = mysqli_connect("localhost", "root", "", "mydb");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the user ID and password from the form
  $id = mysqli_real_escape_string($conn, $_POST["id"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);

  // Check if the user ID and password are correct
  $query = "SELECT * FROM personeel WHERE id = '$id' AND wachtwoord = '$password'";
  $result = mysqli_query($conn, $query);
  $user = mysqli_fetch_assoc($result);

  // If the user ID and password are correct, log the user in and redirect to the admin page
  if ($user) {
    session_start();
    $_SESSION["user_id"] = $user["id"];
    header("Location: admin2.php");
    exit;
  } else {
    // If the user ID and password are incorrect, print an error message
    //echo "Incorrect ID or password. Please try again.";
  }
}

// Close the database connection
mysqli_close($conn);
?>

<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
  </head>
  <body class="login-page">
  <div class="container">
        <div class="navbar">
            <img src="kasteel-logo.png" class="logo">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="rooms.php">Rooms</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Login</a></li>
                    <li><a href="index2.php">test site</a></li>
                   
                </ul>
            </nav>
            <img src="menu.png" class="menu-icon">
        </div>
    </div>
    <!-- Add a header for the website -->
    <header> 
    </header>
    
    <article>

    <br><br>
      <div class="login-square">
      <form action="contact.php" method="post">
    <label>Employee Login Form</label> <br> <br> <br>
    <label for="id">ID:</label><br>
    <input type="text" id="id" name="id"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Submit"> <br>
    <!-- If the user ID and password are incorrect, print an error message -->
    <?php if(!isset($user) && $_SERVER["REQUEST_METHOD"] == "POST"){echo "Incorrect ID or password. Please try again.";} ?>
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