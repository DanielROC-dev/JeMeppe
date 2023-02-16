<html>


<body>
	<h1>Hotel Rooms</h1>
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
					if (!empty($amenities)) {
						echo "<ul>";
						foreach ($amenities as $amenity) {
							echo "<li>" . $amenity . "</li>";
						}
						echo "</ul>";
						$amenities = array();
					}
					echo "<h2>" . $row["naam"] . "</h2>";
					echo "<p>" . $row["beschrijving"] . "</p>";
					
					$current_room_id = $row["id"];
				}
				$amenities[] = $row["wc"];
                $amenities[] = $row["douche"];
                $amenities[] = $row["wastafel"];
                $amenities[] = $row["aantalPersonen"];
			}
			// Print the amenities for the last room
			echo "<ul>";
			foreach ($amenities as $amenity) {
				echo "<li>" . $amenity . "</li>";
			}
			echo "</ul>";
		} else {
			echo "<p>No rooms found.</p>";
		}
	?>
</body>

</html>










<?php




/*if(isset($_POST['id']))
{
    $conn = mysqli_connect("localhost", "root", "", "mydb");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $conn->query("SET FOREIGN_KEY_CHECKS=0");
    $id = $_POST['id'];
    $delete_voorzieningen = "DELETE FROM voorzieningen WHERE id = (SELECT voorzieningen_id FROM kamervoorz WHERE kamer_id = $id)";
    $delete_kamervoorz = "DELETE FROM kamervoorz WHERE kamer_id = $id";
    $delete_kamer = "DELETE FROM kamer WHERE id = $id";
    

    if (mysqli_query($conn, $delete_voorzieningen) && mysqli_query($conn, $delete_kamer) && mysqli_query($conn, $delete_kamervoorz)) {
        echo 'success';
    } else {
        echo mysqli_error($conn);
    }
    $conn->query("SET FOREIGN_KEY_CHECKS=1");

    mysqli_close($conn);
}
?>*/
