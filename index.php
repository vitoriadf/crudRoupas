<?php
session_start();
require 'conecao.php';
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
} ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tabelas.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Document</title>

    <?php require 'navbar.php'; ?>

<body class="bg-body-tertiary h-100">
    <section>
        <div class="container">
            <h1 class="titulo mb-5 tituloHome">Inicio</h1>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="tabelaRoupa.php" class="card-link text-decoration-none">
                        <div class="card border-success p-4">
                            <div class="card-body text-center">
                                <h5 class="card-title text-success mb-3">Lista de Produtos</h5>
                                <p class="card-text text-success">Controle de Estoque</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="tabelaCategoria.php" class="card-link text-decoration-none">
                        <div class="card border-primary p-4">
                            <div class="card-body text-center">
                                <h5 class="card-title text-primary mb-3">Lista de Categoria</h5>
                                <p class="card-text text-primary">Controle de Estoque</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="relatorio.php" class="card-link text-decoration-none">
                        <div class="card border-dark p-4">
                            <div class="card-body text-center">
                                <h5 class="card-title text-dark mb-3">Relatório</h5>
                                <p class="card-text text-dark">Controle de Estoque</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>


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