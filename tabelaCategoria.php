<?php
session_start();
require 'conecao.php';
if (!isset($_SESSION['id'])) {
  header('Location: login.php');
}
$sql = "SELECT * FROM categorias";
$result = $conn->prepare($sql);
$result->execute();
$categorias = $result->fetchAll(PDO::FETCH_ASSOC);

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
    .container {
        margin-top: 50px;
    }

    .titulo {
        color: #71276f;
        margin-top: 20px;
    }

    .Tabela {
        border: 1px solid #71276f !important;
        width: 70%;

    }

    .cabecalhoTabela {
        background-color: #71276f !important;
    }

    .botaoCadastrar {
        margin-top: 30px;
    }

    .colunas {
        width: 80%;
    }
    </style>
</head>

<body>
    <?php
    require ('navbar.php');
    ?>
    <div class="container">

        <?php if(isset($_GET['delete']) && $_GET['delete'] == 'excluido'){ ?>
        <p class="text-center mb-3 text-danger">categoria excluida com sucesso!</p>
        <?php } ?>

        <?php if(isset($_GET['success']) && $_GET['success'] == 'produtoCadastrado'){ ?>
        <p class="text-center mb-3 text-success">categoria cadastrada com sucesso!</p>
        <?php } ?>

        <?php if(isset($_GET['danger']) && $_GET['danger'] == 'campoBranco'){ ?>
        <p class="text-center mb-3 text-danger">Preencha os campos!</p>
        <?php } ?>

        <?php if(isset($_GET['update']) && $_GET['update'] == 'success'){ ?>
        <p class="text-center mb-3 text-success">Cadegoria editada com sucesso!</p>
        <?php } ?>

        <div class="row align-items-center justify-content-between mb-3">
            <div class="col">
                <h2 class="titulo">Categoria</h2>
            </div>
            <div class="col-auto">
                <button type="button" class="btn border-primary text-primary botaoCadastrar" data-bs-toggle="modal"
                    data-bs-target="#cadastroModal">Cadastrar</button>
            </div>

        </div>
        <div class="row mt-5 justify-content-center">

            <div class="col">

                <?php
        if (count($categorias) > 0) {
        ?>
                <div class="table-responsive">
                    <table class="table Tabela">
                        <thead>
                            <tr>
                                <th class="text-white cabecalhoTabela">Id</th>
                                <th class="text-white cabecalhoTabela">Nome</th>
                                <th class="text-white cabecalhoTabela">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
              foreach ($categorias as $categoria) {
                echo "<tr>";
                echo "<td class='col-4 colunas'> " . $categoria['id'] . "</td>";
                echo "<td class='col-4 colunas '> " . $categoria['nome'] . "</td>";
                echo "<td class='col-4 colunas'>
                <div class='d-flex'>
                  <form method='POST' action='verificar/deleteCateg.php'>
                    <input name='id' type='hidden' value='" . $categoria['id'] . "'>
                    <input name='nome' type='hidden' value='" . $categoria['nome'] . "'>
                    <button class='btn border-danger text-danger me-2' type='button' data-bs-toggle='modal' data-bs-target='#excluir" . $categoria['id'] . "'>Excluir</button>
                    <div class='modal fade' id='excluir" . $categoria['id'] . "' tabindex='-1' aria-labelledby='excluirLabel" . $categoria['id'] . "' aria-hidden='true'>
                      <div class='modal-dialog modal-dialog-centered'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='excluirLabel" . $categoria['id'] . "'>Confirmação</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                          </div>
                          <div class='modal-body'>
                            Tem certeza de que deseja excluir a categoria \"" . $categoria['nome'] . "\"?
                          </div>
                          <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                            <button name='delete' type='submit' class='btn btn-danger'  data-bs-dismiss='modal'>Excluir</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                 
                <button type='submit' class='btn border-primary text-primary' data-bs-toggle='modal' data-bs-target='#modalEditarCategoria" . $categoria['id'] . "' name='atualizar'>Atualizar</button>
                </td>"; 
              }
              ?>
                        </tbody>
                    </table>
                </div>
                <?php foreach ($categorias as $categoria) { ?>
                <div class="modal fade" id="modalEditarCategoria<?php echo $categoria["id"]; ?>" tabindex="-1"
                    aria-labelledby="modalEditarCategoriaLabel<?php echo $categoria["id"]; ?>" aria-hidden="true">
                    <div class="modal-lg modal-dialog modal-dialog-centered " style="width: 600px;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <main class="w-100 m-auto form_container" style="max-width: 600px;">
                                    <form action="verificar/updateCateg.php" method="POST">
                                        <h3 class="mb-3 text-center mt-3" style="color:#43143d;">Atualizar categoria
                                        </h3>
                                        <p class="text-center mb-4" style="color:#43143d;">Preencha os campos abaixo</p>
                                        <div class="mb-3">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control"
                                                        id="nomeCategoria<?php echo $categoria["id"]; ?>" name="nome"
                                                        value="<?php echo $categoria["nome"]; ?>" required>
                                                    <label for="nomeCategoria<?php echo $categoria["id"]; ?>">Nome da
                                                        categoria</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-lg  py-3 px-4 m-2  btn-secondary"
                                                data-bs-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-lg py-3 px-4 m-2 text-white "
                                                name="atualizar" style="background-color: #43143d;">Salvar</button>
                                            <input type="hidden" name="id" value="<?php echo $categoria["id"]; ?>">
                                        </div>
                                    </form>
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>



                <?php } else {
          echo '<h1>Nenhuma categoria cadastrada!</h1>';
        }
        ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cadastroModal" tabindex="-1" aria-labelledby="cadastroModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered " id="larguraMain">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <main class="w-100 m-auto  formContainer">
                        <form action="verificar/verifCadastroCateg.php" method="POST" data-parsley-validate>
                            <h3 class="mb-3 text-center mt-3 corTitulo">Cadastrar categoria</h3>
                            <p class=" text-center mb-4 corTitulo">Preencha os campos abaixo</p>
                            <div class="mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInput" name="nome"
                                            placeholder="Nome do produto" required>
                                        <label for="floatingInput">Nome da categoria</label>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <a href="tabelaCategoria.php"
                                        class="btn btn-secondary btn-lg py-3 px-4 m-2 text-white ">Voltar</a>
                                    <input type="submit" class="btn btn-lg py-3 px-3 m-2 text-white " id="botao"
                                        name="cadastrar" value="Cadastrar">
                                </div>
                        </form>
                    </main>
                    </form>
                </div>
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
<script src="./node_modules/jquery/dist/jquery.js"></script>
<script src="./node_modules/parsleyjs/dist/parsley.min.js"></script>
<script src="./node_modules/parsleyjs/dist/i18n/pt-br.js"></script>
<link rel="stylesheet" href="./node_modules/parsleyjs/src/parsley.css">

</html>