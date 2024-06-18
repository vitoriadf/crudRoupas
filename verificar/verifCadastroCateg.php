<?php 
if(isset($_POST['cadastrar'])){
    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        
        $nome = $_POST['nome'];
    
        require'../conecao.php';
        

        $sql = "INSERT INTO categorias(nome) VALUES(:nome)";
        $result = $conn->prepare($sql);
        $result->bindValue(":nome", $nome);
        $result->execute();

        header('location:../tabelaCategoria.php?success=produtoCadastrado');

    }else{
        header('location:../tabelaCategoria.php?danger=campoBranco');
    }
}    
?>