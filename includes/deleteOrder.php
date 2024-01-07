<?php

  if($_SERVER["REQUEST_METHOD"] =="POST"){
    $username = $_POST["username"];
    $AWB = $_POST["AWB"];
    try{
        require_once "dbh.inc.php"; // aici foloseste o data tot codul din fisierul mentionat pentru a nu mai repeta codul
        
        $query = "DELETE A FROM Comanda A
                  Join Clienti B on A.id_client = B.id_client
                  Join Livrare C on A.id_livrare = C.id_livrare
                  Where B.numele_clientului = :username AND C.AWB = :AWB";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":AWB", $AWB);
        $stmt->execute();

        $query = "DELETE C FROM Livrare C 
                  Where C.AWB = :AWB";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":AWB", $AWB);
        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../order_delete.php"); 

        die(""); // or exit()
    } catch (PDOException $e) {
        die("Query failed: " .$e->getMessage());
    }
  }
  else{
    // in cazul in care vrea sa intre pe o pagina fara sa se conecteze il trimitem inapoi pe pagina de sign up/ login
    header("Location: ../order_delete.php"); 
  }