<?php


//Mensagem por sessao
session_start();

//Conexão com BD
include_once("connection.php");

//Para eu poder saber qual a minha base URL aqui nesse cara
include_once("url.php");

$data = $_POST;

// MODIFICAÇÕES NO BANCO
if(!empty($data)) {

    print_r($data);

    //Criar Contato
    if($data["type"] === "create") {
        
        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];

        $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);

        try {
            
            $stmt->execute();
            $_SESSION["msg"] = "Contato criado com sucesso!!";            



        } catch (PDOException $e) {
            //ERRO DE CONEXÃO
            $error = $e->getMessage();
            echo "Erro: $error"; 
        }


    }


// SELEÇÃO DE DADOS
} else {

    $id;

if(!empty($_GET)) {
  $id = $_GET["id"];
}
//Retorna os dados de um contato
if(!empty($id)) {

    $query = "SELECT * FROM contacts WHERE id = :id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    $contact = $stmt->fetch();

} else {

    //Retorna todos os contatos
    $contacts = [];
    
    //Primeira coisa a fazer é puxar os dados da query
    $query = "SELECT * FROM contacts";
    //Como eu não tenho paramentros eu não tenho bind_paran aqui nesse caso
    $stmt = $conn->prepare($query);

    $stmt->execute();

    //Não esquecer de inserir o processamento no Header, pois toda vez que eu iniciar uma página eu vou ter o processamento do meu process.php
    $contacts = $stmt->fetchAll();
}

}

// ENCERRAR CONEXÃO
// NÃO É O MODO MAIS ELEGANTE, PORÉM FUNCIONA

$conn = null;








