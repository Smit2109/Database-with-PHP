<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedYear = $_POST["spent_Top"]; // Assuming the name of your select element is "cars"

    try {
        require_once "dbh.inc.php"; // include the code from dbh.inc.php to establish the database connection

        $query = "SELECT C.numele_clientului, SUM(F.Valoare) as total_spent
                  FROM comanda A
                  JOIN livrare B ON B.id_livrare = A.id_livrare
                  JOIN clienti C ON A.id_client = C.id_client
                  JOIN factura F ON F.id_factura = A.id_factura
                  WHERE YEAR(B.data_livrare) = :selectedYear
                  GROUP BY C.id_client
                  HAVING SUM(F.Valoare) >= All (
                    SELECT SUM(D.Valoare) 
                    FROM factura D
                    JOIN comanda F ON F.id_factura = D.id_factura
                    JOIN livrare E ON E.id_livrare = F.id_livrare
                    WHERE YEAR(E.data_livrare) = :selectedYear
                    GROUP BY F.id_client
                    )";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":selectedYear", $selectedYear);
        $stmt->execute();

        // Fetch the result as an associative array
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the query returned any results
        if ($result) {
            // Display the results in a box on the same page
            
            echo "<div style='padding: 10px; font-size: 2em; margin: 10px; color: white; text-align: center'>"; // Added color: white
            echo "Clientul care a cheltuit cel mai mult in anul ";
            echo "<span style='color: green;'>";
            echo $selectedYear;
            echo "</span>"; // Added the closing angle bracket
            echo " este ";
            echo "<span style='color: green;'>";
            echo $result["numele_clientului"];
            echo "</span>";
            echo "care a cheltuit ";
            echo "<span style='color: green;'>";
            echo $result["total_spent"];
            echo "</span>";
            echo "</div>";

        } else {
            // Display the error message in white
            echo "<div style='padding: 10px; font-size: 2em; margin: 10px; color: white; text-align: center'>";
            echo "<div style='color: white;'>Nu am găsit niciun client cu comenzi în ";
            echo "<span style='color: green;'>";
            echo $selectedYear;
            echo "</span>";
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
