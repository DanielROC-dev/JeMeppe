<html>
    <body>  <!-- kamer reservatie inputs -->
        <form action="reservation.php" method="post">
            <label for="name">Naam:</label>
            <input type="text" placeholder="bas van der dijk" id="name" name="name"><br><br>

            <label for="email">Email:</label>
            <input type="email" placeholder="bvandijk@gmail.com" id="email" name="email"><br><br>

            <label>Telefoon</label>
            <input type="tel" id="tel" placeholder="06-12345678" required name="tel" value=""><br> <br>

            <label>Aanmerkingen</label>
            <input type="text" id="notes" name="notes" placeholder="zou er een wieg op de kamer geplaats kunnen worden" size="50" value=""><br> <br>

            <label for="start_date">Start Datum:</label>
            <input type="date" id="start_date" name="start_date"><br><br>

            <label for="end_date">Eind Datum:</label>
            <input type="date" id="end_date" name="end_date"><br><br>

            <input type="submit" value="Make Reservation"> <br> <br> <br>
        </form>

        <!-- kamer toevoegen aan systeem -->
        <form action="admin.php" method="post">
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
        </form>


    </body>
</html>