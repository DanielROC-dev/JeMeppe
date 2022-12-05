<?php
class Reservatie 
{
    private $pdo;
    private $stmt;
    public $error;
    function __contruct () 
    {
        try 
        {
            $this->pdo = new PDO
            (
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHAR,
                DB_USER, DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (Exception $ex) { exit($ex->getMessage()); }
    }

    function __destruct () 
    {
        $this->pdo = null;
        $this->stmt = null;
    }

    function save ($name, $email, $tel, $start_res, $end_res, $notes)
    {
        try 
        {
            $this->stmt = $this->pdo->prepare(
                "INSERT INTO `gastinfo` (`gast_naam`, `gast_email`, `gast_tel`, `gast_startres`, `gast_eindres`, `gast_aanmerking`) VALUES (?, ?, ?, ?, ?, ?)");
            $this->stmt->execute([$name, $email, $tel, $start_res, $end_res, $notes]);
            return true;
        }   
        catch (Exception $ex) 
        {
            $this->error = $ex->getMessage();
            return false;
        }
    }

}


// DATABASE
define("DB_HOST", "localhost");
define("DB_NAME", "gastinfo");
define("DB_CHAR", "utf8");
define("DB_USER", "root");
define("DB_PASS", "");


// NEW RESERVATION
$_RSV = new Reservatie();


// TEST 
echo $_RSV->save("pharrel william", "pharrelW@gmail.com", "0612345678", "2023-01-12", "2023-02-01", "niet in de media zetten ofzo")
? "OK" : $_RSV->error;

