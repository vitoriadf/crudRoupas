<?php
if(isset($_POST['delete'])){
    if(isset($_POST['id'])){
    require'../conecao.php';
    $id = $_POST['id'];
    $nome = $_POST['nome'];
   

    $sql = "DELETE FROM categorias WHERE id = :id";
    $result = $conn->prepare($sql);
    $result->bindValue(":id",$id);
    $result-> execute();
    header('Location: ../tabelaCategoria.php?nomeCategoria=$nome&delete=excluido');
   
    }
}

?>