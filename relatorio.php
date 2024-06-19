<?php
session_start();
require 'conecao.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
}

$sql = "SELECT  ContIDCat, categorias  FROM trelatorio LIMIT 2";
$result = $conn->prepare($sql);
$result->execute();
$categoriaMaisCadast = $result->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM categorias";
$result = $conn->prepare($sql);
$result->execute();
$categorias = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tabelas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <title>Relatório</title>
</head>

<body>
    <?php require 'navbar.php'; ?>

    <div class="container mt-5">
        <?php if ($categoriaMaisCadast) { ?>
            <h2 class="titulo mt-5 mb-5">Categoria com mais roupas cadastradas</h2>
            <div class="row justify-content-center">
                <div class="col-12">
                    <table class="table bordaTabela">
                        <thead>
                            <tr>
                                <th class="text-white cabecalhoTabela">Nome da categoria</th>
                                <th class="text-white cabecalhoTabela">Quantidae</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $categoriaMaisCadast['categorias']; ?></td>
                                <td><?php echo $categoriaMaisCadast['ContIDCat']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php }; ?>
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