<?php
session_start();
require('conecao.php');

if (!isset($_SESSION['id'])) {
  header('Location: login.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $nome= $_GET['nome'];

    
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $result = $conn->prepare($sql);
    $result->bindValue(":id", $id);
    $result->execute();
    $produtos = $result->fetch(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>

<html lang="pt-br" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tabelas.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    
    <title>cadastrar</title>
    
</head>
 <?php
    require ('navbar.php');
    ?>
<body class="h-100">
   
   <main class="w-100 m-auto mt-5 formContainer " >
    <form action='verificar/update.php' method='POST'  data-parsley-validate>
    <h1 class="mb-3 text-center corTitulo">Editar produtos</h1>
    <p class=" text-center mb-4 corTitulo" >Preencha os campos abaixo</p>
        <input name='id' type='hidden' value='<?php echo $id; ?>'>
        <div class='row g-2 mb-3'>
            <div class='col-md-6'>
                <div class='form-floating'>
                    <input type='text' class='form-control' id='nome' name='nome' placeholder='Nome do produto' value='<?php echo $produtos['nome']; ?>' required>
                    <label for='nome'>Nome do produto</label>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='form-floating'>
                    <input type='text' class='form-control' id='cor' name='cor' placeholder='Cor' value='<?php echo $produtos['cor']; ?>'  required>
                    <label for='cor'>Cor</label>
                </div>
            </div>
        </div>
        <div class='row g-2 mb-3'>
            <div class='col-md-6'>
                <div class='form-floating'>
                    <input type='text' class='form-control' id='material' name='material' placeholder='Material' value='<?php echo $produtos['material']; ?>'  required>
                    <label for='material'>Material</label>
                </div>
            </div>
         <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" id="categoria" name="categoria" aria-label="Categoria"  required>
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
        </div>
        <div class='row g-2 mb-3'>
            <div class='col-md-6'>
                <div class='form-floating'>
                    <input type='number' class='form-control' id='preco' name='preco' placeholder='Preço' value='<?php echo $produtos['preco']; ?>' required>
                    <label for='preco'>Preço</label>
                </div>
            </div>
            <div class='col-md-6'>
                <div class='form-floating'>
                    <input type='number' class='form-control' id='quantidade' name='quantidade' placeholder='Quantidade' value='<?php echo $produtos['quantidade']; ?>'  required>
                    <label for='quantidade'>Quantidade</label>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="tabelaRoupa.php" class="btn btn-secondary btn-lg py-3 px-4 m-2 text-white ">Voltar</a>
            <input type="submit" class="btn btn-lg py-3 px-3 m-2 text-white" id="botao"  name="atualizar" value="Atualizar">
        </div>
    </form>
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
</main>

</body>
<script src="./node_modules/jquery/dist/jquery.js"></script>
<script src="./node_modules/parsleyjs/dist/parsley.min.js"></script>
<script src="./node_modules/parsleyjs/dist/i18n/pt-br.js"></script>
<link rel="stylesheet" href="./node_modules/parsleyjs/src/parsley.css">
</html>