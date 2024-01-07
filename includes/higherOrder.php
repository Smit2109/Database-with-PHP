<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderValue = $_POST["valueHigh"];

    try {
        require_once "dbh.inc.php"; // include the code from dbh.inc.php to establish the database connection

        $query = "SELECT A.AWB, F.valoare
                  FROM livrare A
                  JOIN livrator B ON A.id_livrator = B.id_livrator
                  JOIN comanda C ON C.id_livrare = A.id_livrare
                  JOIN factura F ON F.id_factura = C.id_factura
                  WHERE F.valoare >= :orderValue";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":orderValue", $orderValue);
        $stmt->execute();

        // Fetch all results as an associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if the query returned any results
        if ($results) {
            // Display the results in a box on the same page
            echo "<div style='border: 1px solid #000; border-radius:2em; border-color: white; padding: 10px; font-size: 2em; margin: 10px; color: white; text-align: center'>"; // Added color: white
            echo "<br>";
            // Iterate through each result and display the details
            foreach ($results as $result) {
                echo "<div style='text-align: left'>";
                echo "AWB-ul comenzii este " . $result["AWB"] . " și aceasta valorează ". $result["valoare"] . "<br>";
                echo "<br>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            // Display the error message in white
            echo "<div style='padding: 10px; font-size: 2em; margin: 10px; color: white; text-align: center'>";
            echo "<div style='color: white;'>Nu am găsit nicio comandă care să valoreze mai mult decât valoarea introdusă.</div>";
        }

        // Close the database connection
        $pdo = null;
        $stmt = null;

        // Don't redirect, just end the script here
        die("");
    } catch (PDOException $e) {
        // Display the error message in white
        die("<div style='color: white;'>Query failed: " . $e->getMessage() . "</div>");
    }
} else {
    header("Location: ../index.php");
    die(""); // or exit()
}
?>
