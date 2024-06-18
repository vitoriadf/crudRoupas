<?php
session_start();
require 'conecao.php';
if (!isset($_SESSION['id'])) {
  header('Location: login.php');
}
$sql = "SELECT p.id, p.nome, p.cor, p.material, p.preco, p.quantidade, c.nome AS categoria_nome
        FROM produtos p
        JOIN categorias c ON p.id_categoria = c.id";
$result = $conn->prepare($sql);
$result->execute();
$produtos = $result->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="tabelas.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <style>


    </style>
</head>

<body class="bg-body-tertiary h-100">
    <?php
    require ('navbar.php');
    ?>
    <div class="container">
        <?php if(isset($_GET['delete']) && $_GET['delete'] == 'excluido'){ ?>
        <p class="text-center mb-3 text-danger">Produto excluido com sucesso!</p>
        <?php } ?>

        <?php if(isset($_GET['success']) && $_GET['success'] == 'produtoCadastrado'){ ?>
        <p class="text-center mb-3 text-success">Produto cadastrado com sucesso!</p>
        <?php } ?>

        <?php if(isset($_GET['danger']) && $_GET['danger'] == 'campoBranco'){ ?>
        <p class="text-center mb-3 text-danger">Preencha os campos!</p>
        <?php } ?>

        <?php if(isset($_GET['update']) && $_GET['update'] == 'success'){ ?>
        <p class="text-center mb-3 text-success">Produto editado com sucesso!</p>
        <?php } ?>

        <div class="d-flex  align-items-center justify-content-between">
            <h2 class="titulo">Estoque</h2>
            <a href="formCadastroProd" class="btn border-primary text-primary botaoCadastrar ">Cadastrar</a>
        </div>
        <div class="row mt-5">
            <div>
                <?php
                if (count($produtos) > 0) {
                  ?>
                  <div class="table-responsive ">
                    <table class="table bordaTabela">
                      <thead>  
                        <tr>
                          <th class="text-white cabecalhoTabela">Id</th>
                          <th class="text-white cabecalhoTabela">Nome</th>
                          <th class="text-white cabecalhoTabela">Cor</th>
                          <th class="text-white cabecalhoTabela" >Material</th>
                          <th class="text-white cabecalhoTabela">Categoria</th>
                          <th class="text-white cabecalhoTabela" >Preço</th>
                          <th class="text-white cabecalhoTabela">Quantidade</th>
                          <th class="text-white cabecalhoTabela">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($produtos as $produto) {
                          echo "<tr>";
                          echo "<td>" . $produto['id'] . "</td>";
                          echo "<td>" . $produto['nome'] . "</td>";
                          echo "<td>" . $produto['cor'] . "</td>";
                          echo "<td>" . $produto['material'] . "</td>";
                          echo "<td>" . $produto['categoria_nome'] . "</td>";
                          echo "<td>" . $produto['preco'] . "</td>";
                          echo "<td>" . $produto['quantidade'] . "</td>";
                          echo "<td>
                          <div class='d-flex'>
                            <form method='POST' action='verificar/delete.php'>
                              <input name='id' type='hidden' value='" . $produto['id'] . "'>
                              <input name='nome' type='hidden' value='" . $produto['nome'] . "'>
                              <button class='btn border-danger text-danger me-2' type='button' data-bs-toggle='modal' data-bs-target='#confirmModal" . $produto['id'] . "'>Excluir</button>
                              
                              <div class='modal fade ' id='confirmModal" . $produto['id'] . "' tabindex='-1' aria-labelledby='confirmModalLabel" . $produto['id'] . "' aria-hidden='true'>
                                <div class='modal-dialog modal-dialog-centered'>
                                  <div class='modal-content'>
                                    <div class='modal-header'>
                                      <h5 class='modal-title' id='confirmModalLabel" . $produto['id'] . "'>Confirmação</h5>
                                      <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                      Tem certeza de que deseja excluir o produto \"" . $produto['nome'] . "\"?
                                    </div>
                                    <div class='modal-footer'>
                                      <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                      <button name='confirmDelete' type='submit' class='btn btn-danger'  data-bs-dismiss='modal'>Excluir</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                           <form action='formUpdate.php' method='GET'>
                          <button type='submit' class='btn border-primary text-primary' name='atualizar'>Atualizar</button>
                          <input name='id' type='hidden' value='" . $produto['id']. "'>
                          <input name='nome' type='hidden' value='".$produto['nome']."'>
                          </form>
          
                             
                          </td>"; 
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
          
                <?php } else {
          echo '<h1>Nenhum produto cadastrado!</h1>';
        }
        ?>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalSairConta" tabindex="-1" aria-labelledby="modalSairContaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSairContaLabel">Sair da Conta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Você tem certeza que deseja sair da sua conta?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="verificar/logout.php" class="btn btn-danger">Sair da Conta</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>