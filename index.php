<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
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
                echo $_POST['kamers'];
                if(isset($_POST['submit'])){
                    if(!empty($_POST['kamers'])){
                        $selected = $_POST['kamers'];
                        
                    }
                    
                    }else {
                        $selected = "De Geheime Kamer";
                }

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

                echo "<form action='' method='post'><label> kies uw kamer hier </label><select name='kamers'>";
                $GetRows = $con->query("SELECT Naam FROM kamers");
                while ($row = mysqli_fetch_assoc($GetRows)){
                    echo "<option value=''>" . implode($row) . "</option>";
                    echo  "<br><br>\n";
                }
                echo '</select><input type="submit" name="kamers" value="submit"></form>';
                
                
            ?>
        </tbody>
    </table>

    
</body>
</html>