<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        require_once "dbh.inc.php"; // include the code from dbh.inc.php to establish the database connection

        $query = "SELECT B.nume_sofer, A.data_livrare, A.adresa_livrare, A.stare_livrare, B.telefon_sofer
          FROM livrare A
          JOIN livrator B ON A.id_livrator = B.id_livrator
          WHERE DATE(A.data_livrare) >= CURDATE()";

        $stmt = $pdo->prepare($query);
        $stmt->execute();

        // Fetch all results as an associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if the query returned any results
        if ($results) {
            // Display the results in a box on the same page
            echo "<div style='border: 1px solid #000; border-radius:2em; border-color: white; padding: 10px; font-size: 2em; margin: 10px; color: white; text-align: center'>"; // Added color: white
            echo "<h2>Despre comandă:</h2>";

            // Iterate through each result and display the details
            foreach ($results as $result) {
                echo "<div style='text-align: left'>";
                echo "Numele șoferului: " . $result["nume_sofer"] . "<br>";
                echo "Telefon șofer: " . $result["telefon_sofer"] . "<br>";
                echo "Data livrării: " . $result["data_livrare"] . "<br>";
                echo "Adresa livrării: " . $result["adresa_livrare"] . "<br>";
                echo "Statusul livrării: " . $result["stare_livrare"] . "<br>";
                echo "<br>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            // Display the error message in white
            echo "<div style='padding: 10px; font-size: 2em; margin: 10px; color: white; text-align: center'>";
            echo "<div style='color: white;'>Nu mai sunt comenzi de livrat.</div>";
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
