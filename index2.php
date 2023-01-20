<html>
    <body>
        <form action="reservation.php" method="post">
            <label for="name">Name:</label>
            <input type="text" placeholder="bas van der dijk" id="name" name="name"><br><br>

            <label for="email">Email:</label>
            <input type="email" placeholder="bvandijk@gmail.com" id="email" name="email"><br><br>

            <label>Telefoon</label>
            <input type="tel" id="tel" placeholder="06-12345678" required name="tel" value=""><br> <br>

            <label>Aanmerkingen</label>
            <input type="text" id="notes" name="notes" placeholder="zou er een wieg op de kamer geplaats kunnen worden" size="50" value=""><br> <br>

            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date"><br><br>

            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date"><br><br>

            <input type="submit" value="Make Reservation">
        </form>
    </body>
</html>