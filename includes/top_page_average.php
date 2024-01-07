<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedYear = $_POST["average_Top"]; // Assuming the name of your select element is "cars"

    try {
        require_once "dbh.inc.php"; // include the code from dbh.inc.php to establish the database connection

        $findAverage = "SELECT AVG(D.Valoare) AS avg_valoare
                        FROM factura D
                        JOIN comanda F ON F.id_factura = D.id_factura
                        JOIN livrare E ON E.id_livrare = F.id_livrare
                        WHERE YEAR(E.data_livrare) = :selectedYear ";
        $findAverage = $pdo->prepare($findAverage);
        $findAverage->bindParam(":selectedYear", $selectedYear);
        $findAverage->execute();
        // Fetch all results as an associative array
        $average = $findAverage->fetch(PDO::FETCH_ASSOC);



        $query = "SELECT C.numele_clientului, SUM(F.Valoare) AS total_spent
                  FROM comanda A
                  JOIN livrare B ON B.id_livrare = A.id_livrare
                  JOIN clienti C ON A.id_client = C.id_client
                  JOIN factura F ON F.id_factura = A.id_factura
                  WHERE YEAR(B.data_livrare) = :selectedYear
                  GROUP BY C.id_client
                  HAVING total_spent > (
                        SELECT AVG(D.Valoare) AS avg_valoare
                        FROM factura D
                        JOIN comanda F ON F.id_factura = D.id_factura
                        JOIN livrare E ON E.id_livrare = F.id_livrare
                        WHERE YEAR(E.data_livrare) = :selectedYear
                  )";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":selectedYear", $selectedYear);
        $stmt->execute();
        // Fetch all results as an associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Check if the query returned any results
        if ($results) {
            // Display the results in a box on the same page
            echo "<div style='padding: 10px; font-size: 2em; margin: 10px; color: white; text-align: center'>";
            echo "Media pe anul ";
            echo "<span style='color: green;'>";
            echo $selectedYear;
            echo "</span> este ";
            echo "<span style='color: green;'>";
            echo $average['avg_valoare'];
            echo "</span> iar clientii care au cheltui mai mult sunt :";
            echo "</br>";
            // Iterate through each result and display it
            foreach ($results as $result) {
                echo "<span style='color: green;'>";
                echo $result["numele_clientului"];
                echo "</span>";
                echo " care a cheltuit ";
                echo "<span style='color: green;'>";
                echo $result["total_spent"];
                echo "</span>";
                echo "<br>";
                
            }
            echo "</div>";
        } else {
            // Display the error message in white
            echo "<div style='padding: 10px; font-size: 2em; margin: 10px; color: white; text-align: center'>";
            echo "Nu am gasit niciun client care sa cheltuie peste medie in anul ";
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
