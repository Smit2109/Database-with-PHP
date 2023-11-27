<?php
// nu inchidem cu " ? > " pentru ca este un php pur, inchizi doar cand mai scrii html

$dsn = "mysql:host=localhost;dbname=firmacurierat";

$dbusername = "root";
$dbpassword = "";

try {
    $pdo =  new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
