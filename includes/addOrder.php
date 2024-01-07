<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $_POST["nume"];
    $produse = $_POST["produse"];
    $adresalivrare = $_POST["adresalivrare"];

    try {
        require_once "dbh.inc.php"; // include the database connection file

        // Check if username already exists
        $findClientQuery = "SELECT id_client, numar_telefon FROM clienti WHERE numele_clientului = :nume";
        $findClientStmt = $pdo->prepare($findClientQuery);
        $findClientStmt->bindParam(":nume", $nume);
        $findClientStmt->execute();

        // Fetch the client information
        $clientResult = $findClientStmt->fetch(PDO::FETCH_ASSOC);

        if ($clientResult) {
            $id_client = $clientResult['id_client'];
            $numar_telefon = $clientResult['numar_telefon'];

            $awb = rand(1, 99999999);
            $var_livrator = rand(1,5);
            $var_masina = rand(1,5);


            // Insert a new entry into 'livrare'
            $insertLivrareQuery = "INSERT INTO livrare 
                (id_livrator, id_masina, data_livrare, adresa_livrare, stare_livrare, contact_destinatar, AWB, nume_client) 
                VALUES ($var_livrator, $var_masina, NULL, :adresalivrare, 'Neîncepută', :numar_telefon, :awb, :nume)";
            $insertLivrareStmt = $pdo->prepare($insertLivrareQuery);

            // Set the values for the livrare entry
            $insertLivrareStmt->bindParam(":adresalivrare", $adresalivrare);
            $insertLivrareStmt->bindParam(":numar_telefon", $numar_telefon);
            $insertLivrareStmt->bindParam(":awb", $awb);
            $insertLivrareStmt->bindParam(":nume", $nume);

            $insertLivrareStmt->execute();

            // Get the last inserted ID of the livrare entry
            $id_livrare = $pdo->lastInsertId();

            // Insert a new order into the 'comanda' table using the obtained id_client and id_livrare
            $insertQuery = "INSERT INTO comanda 
                (id_client, id_livrare, id_factura, produse, adresa_livrare) 
                VALUES (:id_client, :id_livrare, NULL, :produse, :adresalivrare)";
            $insertStmt = $pdo->prepare($insertQuery);

            $insertStmt->bindParam(":id_client", $id_client);
            $insertStmt->bindParam(":id_livrare", $id_livrare);
            $insertStmt->bindParam(":produse", $produse);
            $insertStmt->bindParam(":adresalivrare", $adresalivrare);

            $insertStmt->execute();
        } else {
            // Handle the case where the client with the given name is not found
            echo "Client not found!";
        }

        // Close the database connection
        $pdo = null;

        // Redirect to the index page
        header("Location: ../index.php");
        exit();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    // If someone tries to access the page without a POST request, redirect to the index page
    header("Location: ../index.php");
    exit();
}
