<?php


//Mensagem por sessao
session_start();

//Conexão com BD
include_once("connection.php");

//Para eu poder saber qual a minha base URL aqui nesse cara
include_once("url.php");

//Primeira coisa a fazer é puxar os dados da query
$query = "SELECT * FROM contacts";
//Como eu não tenho paramentros eu não tenho bind_paran aqui nesse caso
$stmt = $conn->prepare($query);

$stmt->execute();

$contacts = $stmt->fetchAll();