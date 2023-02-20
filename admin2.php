<html>
<?php
session_start();

// Connect to the MySQL database
$conn = mysqli_connect("localhost", "root", "", "mydb");

// Check if the user is logged in
if(!isset($_SESSION["user_id"])) {
  // Redirect the user to the index page if they are not logged in
  header("Location: index.html");
  exit;
}

// Get the user ID from the session
$user_id = $_SESSION["user_id"];

// Get the user's name from the database
$query = "SELECT naam, rol FROM personeel WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Print the user's name
echo "Hello, " . $user["naam"];
echo "<br>";
echo "your rol is: " . $user["rol"];

// Close the database connection
mysqli_close($conn);

echo '<form method="post"><button type="submit" name="logout">logout</button></form>';
if(isset($_POST['logout'])){
    session_destroy();
    header("location:index.html"); // change this to index.html when done editing
    echo "logout triggered";
}
?>

<!-- HTML CODE -->
<head>
    <style>
      .item-info {
        display: none;
      }
      .list-item {
        cursor: pointer;
        padding: 10px;
        width: 100px;
        background-color: lightgray;
        border-radius: 5px;
        margin: 10px 0;
      }
      .list-item:hover {
        background-color: gray;
      }
      table, th, td {
            border: 1px solid black;
            }
    </style>
  </head>
  <body>
    <!-- List item titles-->
    <ul id="list">
      <li class="list-item" data-info="item1-info">Add or Edit a room</li>
      <li class="list-item" data-info="item2-info">Manage reservations</li>
      <li class="list-item" data-info="item3-info">Manage employees</li>
      <li class="list-item" data-info="item4-info">Manage guests</li>
      <li class="list-item" data-info="item5-info">Manage permissions</li>
    </ul>
    <!-- Insert information about list items-->
    <div id="item1-info" class="item-info">
    <table>
            <tr>
                <th>kamer ID</th>
                <th>Naam</th>
                <th>Prijs</th>
                <th>beschrijving</th>
                <th>Delete</th>
            </tr>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "mydb");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                // Select all rows from the "kamer" table
                $result = mysqli_query($conn, "SELECT * FROM kamer");

                // Loop through each row in the "kamer" table
                while($row = mysqli_fetch_array($result)) {      
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['naam'] . "</td>";
                    echo "<td>" . $row['prijs'] . "</td>";
                    echo "<td>" . $row['beschrijving'] . "</td>";
                    echo "<td><form action='admin.php'method='post'><input type='hidden' name='delete_room_id' value='" . $row['id'] . "' /><input type='hidden' name='action' value='delete' /><input type='submit' value='Delete' /></form></td>";
                    echo "</tr>";
                    
                }
                //close connection
                
                mysqli_close($conn);
            ?>


 <!-- kamer toevoegen aan systeem -->
 <form action="admin.php" method="post" name="add_room">
            <label> voeg kamer toe</label> <br> <br>

            <label for="roomname">Kamer Naam:</label>
            <input type="text" placeholder="Muziek Kamer" id="roomname" name="roomname"><br><br>

            <label for="price">Prijs:</label>
            <input type="number" placeholder="200" step="1" id="price" name="price"><br><br>

            <label for="beschrijving">Kamer Beschrijving:</label>
            <input type="text" size="100" id="description" name="description" placeholder="De kamer ligt prachtig in het midden van het kasteel op de 2de verdieping en is perf..." ><br><br>
            
            <label for="quantity">Aantal Personen:</label>
            <input type="number" size ="2" min="1" step="1" id="quantity" name="quantity"/> <br> <br>

            <label for="wc">WC Aanwezig:</label>
            <input type="checkbox" id="wc" name="wc"/> <br> <br>

            <label for="shower">Douche Aanwezig:</label>
            <input type="checkbox" id="shower" name="shower"/> <br> <br>

            <label for="sink">Wastafel Aanwezig:</label>
            <input type="checkbox" id="sink" name="sink"/> <br> <br>
            

            <input type="submit" value="Add Room"> 
        </form> <br> <br>
        </table>

        
    </div>
    <div id="item2-info" class="item-info">
    <table>
            <tr>
                <th>reservation ID</th>
                <th>starting date</th>
                <th>end date</th>
                <th>guest ID</th>
                <th>room ID</th>
            </tr>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "mydb");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                // Select all rows from the "kamer" table
                $result = mysqli_query($conn, "SELECT * FROM reservering");

                // Loop through each row in the "kamer" table
                while($row = mysqli_fetch_array($result)) {      
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['startDatum'] . "</td>";
                    echo "<td>" . $row['eindDatum'] . "</td>";
                    echo "<td>" . $row['Gast_id'] . "</td>";
                    echo "<td>" . $row['Kamer_id'] . "</td>";
                    echo "</tr>";
                    
                }
                //close connection
                
                mysqli_close($conn);
            ?> 


        </table>
    </div>
    <div id="item3-info" class="item-info">
    <table>
            <tr>
                <th>employee ID</th>
                <th>name</th>
                <th>role</th>
                <th>password</th>
                
            </tr>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "mydb");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                // Select all rows from the "kamer" table
                $result = mysqli_query($conn, "SELECT * FROM personeel");

                // Loop through each row in the "kamer" table
                while($row = mysqli_fetch_array($result)) {      
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['naam'] . "</td>";
                    echo "<td>" . $row['rol'] . "</td>";
                    echo "<td>" . "********" . "</td>";
                    echo "</tr>";
                    
                }
                //close connection
                
                mysqli_close($conn);
            ?> 


        </table>
    </div>
    <div id="item4-info" class="item-info">
    <table>
            <tr>
                <th>guest ID</th>
                <th>name</th>
                <th>gmail</th>
                <th>phone number</th>
                <th>notes</th>
                
            </tr>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "mydb");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                // Select all rows from the "kamer" table
                $result = mysqli_query($conn, "SELECT * FROM gast");

                // Loop through each row in the "kamer" table
                while($row = mysqli_fetch_array($result)) {      
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['naam'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['telefoon'] . "</td>";
                    echo "<td>" . $row['notes'] . "</td>";
                    echo "</tr>";
                    
                }
                //close connection
                
                mysqli_close($conn);
            ?> 


        </table>
    </div>
    <div id="item5-info" class="item-info">
      This is information for Item 5
    </div>
    <script>
      const list = document.getElementById("list");
      list.addEventListener("click", function(event) {
        const target = event.target;
        if (target.className === "list-item") {
          const infoId = target.getAttribute("data-info");
          const infoElements = document.querySelectorAll(".item-info");
          for (const infoElement of infoElements) {
            infoElement.style.display = "none";
          }
          document.getElementById(infoId).style.display = "block";
        }
      });
    </script>
  </body>
</html>