<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $AWB = $_POST["AWB"];
    $produse = $_POST["produse"]; // Assuming you have a form field named produse
    $adresa_livrare = $_POST["adresa_livrare"]; // Assuming you have a form field named email

    try {
        require_once "dbh.inc.php";

        $findClientQuery = "SELECT id_client FROM clienti WHERE numele_clientului = :username";
        $findClientStmt = $pdo->prepare($findClientQuery);
        $findClientStmt->bindParam(":username", $username);
        $findClientStmt->execute();
        $clientResult = $findClientStmt->fetch(PDO::FETCH_ASSOC);

        if ($clientResult) {
            $id_client = $clientResult['id_client'];

            $query = "UPDATE comanda A 
                      JOIN Livrare L ON A.id_livrare = L.id_livrare
                      SET A.produse = :produse, A.adresa_livrare = :adresa_livrare 
                      WHERE A.id_client = :id_client AND L.AWB = :AWB";

            $updateStmt = $pdo->prepare($query);
            $updateStmt->bindParam(":produse", $produse);
            $updateStmt->bindParam(":adresa_livrare", $adresa_livrare);
            $updateStmt->bindParam(":id_client", $id_client);
            $updateStmt->bindParam(":AWB", $AWB);
            $updateStmt->execute();
        } else {
            // Handle the case where the client is not found
        }

        $pdo = null;

        header("Location: ../order_update.php");
        exit();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../order_update.php");
    exit();
}
