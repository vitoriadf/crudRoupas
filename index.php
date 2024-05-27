<?php
session_start();
require 'conecao.php';
if(!isset($_SESSION['id'])){
     header('Location: login.php');
}
$sql = "SELECT * FROM produtos";
$result = $conn ->prepare($sql);
$result -> execute();
$produtos = $result->fetchAll(PDO:: FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <style>
    .container {
      margin-top: 50px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <a href="verificar/logout.php" class="btn btn-danger">Sair da Conta</a>
    </div>
  </div>
 
  <div class="row mt-5">
    <div class="col-md-6">
        <?php 
            if(count($produtos)> 0){
        ?>
      <h2>Lista de Produtos</h2>
      <table class="table table-responsive table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
            </tr>
          <?php 
            foreach($produtos as $produto){
                echo "<tr>";
                echo "<td>" . $produto['id'] . "</td>";
                echo "<td>" . $produto['nome'] . "</td>";
                echo "<td>" . $produto['preco'] . "</td>";
                echo "<td>" . $produto['quantidade'] . "</td>";
                echo "</tr>";
            }
          
          ?>
        </tbody>
      </table>
      <?php }else{
        echo '<h1>Nenhum produto cadastrado!</h1>';
      }
      ?>
    </div>
  </div>
</div>


</body>
</html>
