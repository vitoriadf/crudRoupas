<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar</title>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body class="bg-body-tertiary h-100">
    <nav class="navbar navbar-expand-lg navbar-light borda shadow mb-5">
        <div class="container-fluid">
            <a class="navbar corMarca ">CDELR</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link corNome" aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link corNome " href="tabelaRoupa.php">Produtos</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link corNome" href="tabelaCategoria.php">Categorias</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link corNome" href="relatorio.php">Relatório</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <button class="btn border-danger text-danger" data-bs-toggle="modal" data-bs-target="#modalSairConta">Sair da Conta</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>