<?php

  if($_SERVER["REQUEST_METHOD"] =="POST"){
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    try{
        require_once "dbh.inc.php"; // aici foloseste o data tot codul din fisierul mentionat pentru a nu mai repeta codul
        
        $query = "UPDATE clienti SET numar_telefon = :phone, email = :email WHERE numele_clientului = :username";
        
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":email", $email);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: ../modify.php"); 

        die(""); // or exit()
    } catch (PDOException $e) {
        die("Query failed: " .$e->getMessage());
    }
  }
  else{
    // in cazul in care vrea sa intre pe o pagina fara sa se conecteze il trimitem inapoi pe pagina de sign up/ login
    header("Location: ../modify.php"); 
  }