<?php 

    $servername = "localhost";
    $user = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=crud_pdo", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        }
        catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>