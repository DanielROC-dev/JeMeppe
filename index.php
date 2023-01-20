<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
<button onclick="location.href='index2.php'" type="button">
         test versie</button> <br><br>
    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th>Naam</th> 
                <th>Beschrijving</th> 
                <th>Soort</th> 
                <th>WC</th> 
                <th>Douche</th> 
                <th>Wastafel</th>
                <th>prijs</th> 
            </tr>
        </thead>

        <tbody>
            <?php
                $con = new mysqli("localhost","root", "", "jemeppe");
                
                if(isset($_POST['submit'])){
                    if(!empty($_POST['kamers'])) {
                        $selected = $_POST['kamers'];
                    } else {
                        echo 'Please select the value.'; // fix needed set to first room in array
                    }
                } else $selected = "De Rode Kamer";
                echo "<form action='' method='post'><label> kies uw kamer hier </label><select name='kamers'>";
                $GetRows = $con->query("SELECT Naam FROM kamers");
                while ($row = mysqli_fetch_assoc($GetRows)){
                    echo "<option value='" . implode($row) . "' "  .  ">" . implode($row) . "</option>";
                    echo  "<br><br>\n";
                }
                echo '</select><input type="submit"  name="submit"></form>';
                

                $execItems = $con->query("SELECT Naam, Beschrijving, Soort, WC, Douche, Wastafel, Prijs  FROM kamers WHERE Naam = '". $selected . "'");

                while($infoItems = $execItems->fetch_array()){
                    echo"<tr>
                        <td>".$infoItems['Naam']."</td>  
                        <td>".$infoItems['Beschrijving']."</td>
                        <td>".$infoItems['Soort']."</td> 
                        <td>".$infoItems['WC']."</td> 
                        <td>".$infoItems['Douche']."</td>
                        <td>".$infoItems['Wastafel']."</td> 
                        <td>".$infoItems['Prijs']."</td>
                    </tr>";

                }

                
                
            ?>
        </tbody>
    </table> <br> <br>
    
    
    <!-- reservatie -->

    <form id="resForm" method="post" target="_self">
      <label>Naam</label>
      <input type="text" required name="name" placeholder="bas van der dijk" value=""><br> <br>

      <label>Email</label>
      <input type="email" required name="email" placeholder="bvandijk@gmail.com" value=""><br> <br>

      <label>Telefoon</label>
      <input type="tel" placeholder="06-12345678" required name="tel" value=""><br> <br>

      <label>Aanmerkingen</label>
      <input type="text" name="notes" placeholder="zou er een wieg op de kamer geplaats kunnen worden" size="50" value=""><br> <br>

      <?php
     
      $mindate = date("Y-m-d");
      ?>
      <label>Begin Reservatie datum</label> <br>
      <input type="date" required name="date" min="<?=$mindate?>"><br> <br>

      <label>Eind reservatie datum</label> <br>
      <input type="date" required name="date" min="<?=$mindate?>"><br> <br>


      <input type="submit" value="Submit">
      
</form>
</body>
</html>