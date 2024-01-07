<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cars_Order = $_POST["cars_Order"];

    try {
        require_once "dbh.inc.php"; // include the code from dbh.inc.php to establish the database connection

        $query = "SELECT M.numar_inmatriculare, COUNT(*) AS numar_colete
                  FROM masina M
                  JOIN livrare L ON L.id_masina = M.id_masina
                  WHERE YEAR(L.data_livrare) = :cars_Order
                  GROUP BY M.numar_inmatriculare";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":cars_Order", $cars_Order);
        $stmt->execute();

        // Fetch all results as an associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if the query returned any results
        if ($results) {
            // Display the results in a box on the same page
            echo "<div style='border: 1px solid #000; border-radius:2em; border-color: white; padding: 10px; font-size: 2em; margin: 10px; color: white; text-align: center'>";
            echo "<h2>Despre comandă:</h2>";

            // Iterate through each result and display the details
            foreach ($results as $result) {
                echo "<div style='text-align: left'>";
                echo "Număr înmatriculare mașină: " . $result["numar_inmatriculare"] . "<br>";
                echo "Număr colete: " . $result["numar_colete"] . "<br>";
                echo "<br>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            // Display the error message in white
            echo "<div style='padding: 10px; font-size: 2em; margin: 10px; color: white; text-align: center'>";
            echo "<div style='color: white;'>Nu există comenzi pentru anul selectat.</div>";
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
