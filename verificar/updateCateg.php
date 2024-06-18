<?php
require('../conecao.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    if (isset($_POST['atualizar'])) {
        
        $nome = $_POST['nome'];

       
        $sql = "UPDATE categorias SET nome = :nome  WHERE id = :id";
        $result = $conn->prepare($sql);
        $result->bindValue(":id", $id);
        $result->bindValue(":nome", $nome);
    
        $result->execute();

       
        header("Location:../tabelaCategoria.php?update=success");
        exit();
    }
}
?>
