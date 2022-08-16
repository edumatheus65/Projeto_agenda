<?php

// Usando PDO

$host = "localhost";
$dbname = "agenda";
$user = "eduardo";
$pass = "";

try {
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    //Ativar modo de erros
    $conn->setAtribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
    //Erro de conexão
    $error = $e->getMessage();
    echo "Error: $error";
}