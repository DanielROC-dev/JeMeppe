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

                $execItems = $con->query("SELECT Naam, Beschrijving, Soort, WC, Douche, Wastafel, Prijs  FROM kamers WHERE Naam = 'De Rode Kamer'");

                while($infoItems = $execItems->fetch_array()){
                    echo    "
                                <tr>
                                    <td>".$infoItems['Naam']."</td>  
                                    <td>".$infoItems['Beschrijving']."</td>
                                    <td>".$infoItems['Soort']."</td> 
                                    <td>".$infoItems['WC']."</td> 
                                    <td>".$infoItems['Douche']."</td>
                                    <td>".$infoItems['Wastafel']."</td> 
                                    <td>".$infoItems['Prijs']."</td>
                                </tr>
                            ";

                }
            ?>
        </tbody>
    </table>
</body>
</html>