<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numberOfOrders = $_POST["number_Top_orders"];

    try {
        require_once "dbh.inc.php"; // include the code from dbh.inc.php to establish the database connection

        $query = "SELECT C.id_client, C.numele_clientului
                  FROM clienti C
                  WHERE C.id_client IN (
                      SELECT A.id_client
                      FROM comanda A
                      JOIN livrare B ON B.id_livrare = A.id_livrare
                      GROUP BY A.id_client
                      HAVING COUNT(A.id_comanda) >= :number_Top_orders
                  );";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":number_Top_orders", $numberOfOrders);
        $stmt->execute();
        // Fetch all results as an associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Check if the query returned any results
        if ($results) {
            // Display the results in a box on the same page
            echo "<div style='padding: 10px; font-size: 2em; margin: 10px; color: white; text-align: center'>";
            echo "Clinetii care au cel putin ";
            echo "<span style='color: green;'>";
            echo $numberOfOrders;
            echo "</span> comenzi sunt:";
            echo "</br>";
            // Iterate through each result and display it
            foreach ($results as $result) {
                echo "<span style='color: green;'>";
                echo $result["numele_clientului"];
                echo "</span>";
                echo "<br>";
                
            }
            echo "</div>";
        } else {
            // Display the error message in white
            echo "<div style='padding: 10px; font-size: 2em; margin: 10px; color: white; text-align: center'>";
            echo "Nu am gasit niciun client care sa aiba cel putin ";
            echo "<span style='color: green;'>";
            echo $numberOfOrders;
            echo "</span>";
            echo " comenzi";
            echo "</div>";
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
