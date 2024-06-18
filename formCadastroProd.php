<?php
session_start();
require 'conecao.php';
if (!isset($_SESSION['id'])) {
  header('Location: login.php');
}?>

<!DOCTYPE html>
<html lang="pt-br" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tabelas.css">
   
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>cadastrar</title>
</head>
<body class="bg-body-tertiary h-100">
    <?php require ('navbar.php'); ?>
    
    <main class=" m-auto formContainer ">
        
        <form action="verificar/verifCadastroProd" method="POST" data-parsley-validate>
        
            <h1 class="mb-3 text-center corTitulo">Cadastrar produtos</h1>

            <p class="text-center mb-4 corTitulo">Preencha os campos abaixo</p>
            <div class="row g-2 mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="nome" placeholder="Nome do produto" required>
                        <label for="floatingInput">Nome do produto</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="cor" placeholder="Cor" required>
                        <label for="floatingInput">Cor</label>
                    </div>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="material" placeholder="Material" required>
                        <label for="floatingInput">Material</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="categoria" name="categoria" aria-label="Categoria" required>
                            <option selected disabled>Selecione a Categoria</option>
                            <?php
                            require('conecao.php');
                            $sql = "SELECT id, nome FROM categorias ORDER BY nome";
                            $result = $conn->prepare($sql);
                            $result->execute();
                            $categorias = $result->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($categorias as $categoria) {
                                echo "<option value=\"{$categoria['id']}\">{$categoria['nome']}</option>";
                            }
                            ?>
                        </select>
                        <label for="categoria">Categoria</label>
                    </div>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingInput" name="preco" placeholder="Preço" required>
                        <label for="floatingInput">Preço</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingInput" name="quantidade" placeholder="Quantidade" required>
                        <label for="floatingInput">Quantidade</label>
                    </div>
                </div>
            </div>
            <div class="text-center">
              <a href="tabelaRoupa.php" class="btn btn-secondary btn-lg py-3 px-4 m-2 text-white">Voltar</a>
              <input type="submit" class="btn btn-lg py-3 px-4 m-2 text-white" id="botao" data-bs-toggle="modal" data-bs-target="alert" name="cadastrar" value="Cadastrar">
            </div>
        </form>
        
    </main>

    
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
    <link rel="stylesheet" href="./node_modules/parsleyjs/src/parsley.css">
    <script src="./node_modules/jquery/dist/jquery.js"></script>
    <script src="./node_modules/parsleyjs/dist/parsley.min.js"></script>
    <script src="./node_modules/parsleyjs/dist/i18n/pt-br.js"></script>
    
</body>
</html>
