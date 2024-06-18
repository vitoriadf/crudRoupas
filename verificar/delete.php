<?php
if(isset($_POST['confirmDelete'])){
    if(isset($_POST['id'])){
    require'../conecao.php';
    $id = $_POST['id'];
    $nome = $_POST['nome'];
   

    $sql = "DELETE FROM produtos WHERE id = :id";
    $result = $conn->prepare($sql);
    $result->bindValue(":id",$id);
    $result-> execute();
    header("Location: ../tabelaRoupa.php?nomeProduto=$nome&delete=excluido");
    exit; 
}}

?>