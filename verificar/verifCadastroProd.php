<?php 
if(isset($_POST['cadastrar'])){
    if(isset($_POST['nome']) && !empty($_POST['nome'])  && isset($_POST['cor']) && !empty($_POST['cor']) && isset($_POST['material']) && !empty($_POST['material']) && isset($_POST['categoria']) && !empty($_POST['categoria']) && isset($_POST['preco']) && !empty($_POST['preco'])&& isset($_POST['quantidade']) && !empty($_POST['quantidade']) ){
        
        $nome = $_POST['nome'];
        $cor = $_POST['cor'];
        $material = $_POST['material'];
        $categoria = $_POST['categoria'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        require'../conecao.php';
        

        $sql = "INSERT INTO produtos(nome,cor,material,id_categoria,preco,quantidade) VALUES(:nome,:cor,:material,:categoria,:preco,:quantidade)";
        $result = $conn->prepare($sql);
        $result->bindValue(":nome", $nome);
        $result->bindValue(":cor", $cor);
        $result->bindValue(":material", $material);
        $result->bindValue(":categoria", $categoria);
        $result->bindValue(":preco", $preco);
        $result->bindValue(":quantidade", $quantidade);
        $result->execute();

        header('location:../tabelaRoupa.php?success=produtoCadastrado');

    }else{
        header('location:../tabelaRoupa.php?danger=campoBranco');

    }
}    
?>