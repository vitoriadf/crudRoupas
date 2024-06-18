<?php

require('../conecao.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    
    if (isset($_POST['atualizar'])) {
        
        $nome = $_POST['nome'];
        $cor = $_POST['cor'];
        $material = $_POST['material'];
        $categoria = $_POST['categoria'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];

       
        $sql = "UPDATE produtos SET nome = :nome, cor = :cor, material = :material, id_categoria = :categoria, preco = :preco, quantidade = :quantidade WHERE id = :id";
        $result = $conn->prepare($sql);
        $result->bindValue(":id", $id);
        $result->bindValue(":nome", $nome);
        $result->bindValue(":cor", $cor);
        $result->bindValue(":material", $material);
        $result->bindValue(":categoria", $categoria);
        $result->bindValue(":preco", $preco);
        $result->bindValue(":quantidade", $quantidade);
        $result->execute();

       
        header("Location:../tabelaRoupa.php?update=success");
        exit();
    }
}
?>
