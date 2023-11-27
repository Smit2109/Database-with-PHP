<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_comanda = $_POST["id_comanda"];

    try {
        require_once "dbh.inc.php"; // include the code from dbh.inc.php to establish the database connection

        $query = "SELECT * FROM livrare WHERE id_livrare = :id_comanda";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":id_comanda", $id_comanda);
        $stmt->execute();

        // Fetch the result as an associative array
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the query returned any results
        if ($result) {
            // Display the results in a box on the same page
            echo "<div style='border: 1px solid #000; padding: 10px; margin: 10px; color: white;'>"; // Added color: white
            echo "<h2>Order Details</h2>";
            echo "Order ID: " . $result["id_livrare"] . "<br>";
            echo "Driver ID: " . $result["id_livrator"] . "<br>";
            echo "Delivery Time: " . $result["ora_livrare"] . "<br>";
            echo "Delivery Address: " . $result["adresa_livrare"] . "<br>";
            echo "Delivery Status: " . $result["stare_livrare"] . "<br>";
            echo "Recipient Contact: " . $result["contact_destinatar"] . "<br>";
            echo "Sender Contact: " . $result["contact_expeditor"] . "<br>";
            echo "</div>";
        } else {
            // Display the error message in white
            echo "<div style='color: white;'>No results found for the given order ID.</div>";
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
