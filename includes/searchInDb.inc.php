<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numele_clientului = $_POST["numele_clientului"];

    try {
        require_once "dbh.inc.php"; // include the code from dbh.inc.php to establish the database connection

        $query = "SELECT A.id_client, A.numele_clientului, A.numar_telefon, A.email, A.created_at
                  FROM clienti A
                  JOIN clienti B ON A.numele_clientului = B.numele_clientului
                  WHERE A.numele_clientului = :numele_clientului";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":numele_clientului", $numele_clientului);
        $stmt->execute();

        // Fetch the result as an associative array
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the query returned any results
        if ($result) {
            // Display client details
            echo "<div style='padding: 10px; font-size: 2em; margin: 10px; color: blue; text-align: center'>";
            echo "<h2>Despre client</h2>";
            echo "<div style='color: white'>";
            echo "ID Client: " . $result["id_client"] . "<br>";
            echo "Numele Clientului: " . $result["numele_clientului"] . "<br>";
            echo "Numar de telefon " . $result["numar_telefon"] . "<br>";
            echo "Email: " . $result["email"] . "<br>";
            echo "Creat la data: " . $result["created_at"] . "<br>";
            echo "</div>";

            // Display client orders
            echo "<div style='color: blue;'>";
            echo "<h2>Comenzile clientului</h2>";
            echo "<div style='color: white'>";
            
            $query2 = "SELECT L.AWB, MAX(A.produse) AS produse, MAX(F.Valoare) AS Valoare
                       FROM clienti C
                       JOIN livrare L ON L.nume_client = C.numele_clientului
                       JOIN comanda A ON A.id_client = C.id_client
                       JOIN factura F ON F.id_factura = A.id_factura
                       WHERE C.numele_clientului = :numele_clientului
                       GROUP BY L.AWB";

            $stmt2 = $pdo->prepare($query2);
            $stmt2->bindParam(":numele_clientului", $numele_clientului);
            $stmt2->execute();

            // Fetch the results as an associative array
            $results = $stmt2->fetchAll(PDO::FETCH_ASSOC);

            // Check if the query returned any results
            if ($results) {
                foreach ($results as $result) {
                    echo "AWB: " . $result["AWB"] . "<br>";
                    echo "Produse: " . $result["produse"] . "<br>";
                    echo "Valoare: " . $result["Valoare"] . "<br>";
                    echo "<br>";
                }
            } else {
                // Display a message if no orders are found
                echo "<div style='padding: 10px; font-size: 1em; margin: 10px; color: white; text-align: center'>";
                echo "<div style='color: red;'>Clientul nu a dat nicio comandă până acum.</div>";
            }

            echo "</div>"; // Close the div for orders
            echo "</div>"; // Close the div for client details
        } else {
            // Display a message if no client is found
            echo "<div style='padding: 10px; font-size: 2em; margin: 10px; color: white; text-align: center'>";
            echo "<div style='color: red;'>Nu am găsit niciun client cu acest nume.</div>";
        }

        // Close the database connection
        $pdo = null;
        $stmt = null;

        // Don't redirect, just end the script here
        die("");
    } catch (PDOException $e) {
        // Display the error message in white
        die("<div style='color: red;'>Query failed: " . $e->getMessage() . "</div>");
    }
} else {
    header("Location: ../index.php");
    die(""); // or exit()
}
?>
