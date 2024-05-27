<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>login</title>
</head>
<body>
    <section class="vh-100 corDFundo">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-6 col-md-10 col-sm-12" id="cardW" >
                    <div class="card text-white " id="configCard">
                        <div class="card-body p-5"> 
                            <div class="mb-md-4 mt-md-3 pb-4">
                                <h2 class="fw-bold mb-1 text-center text-uppercase">Login</h2>
                                <p class="text-white-50 text-center mb-5 ">Preencha os campos abaixo</p>
                                <form action="verificar/verifLogin.php" method="POST" data-parsley-validate>

                                    <?php if(isset($_GET['success']) && $_GET['success'] == 'ok'){ ?>
                                    <p class="text-center mb-3 conteudoInputSucesso">Usuário cadastrado com sucesso!</p>
                                    <?php } ?>

                                    <?php if(isset($_GET['error']) && $_GET['error'] === 'erro'){ ?>
                                    <p class="text-center  mb-3 conteudoInputError"  role="alert">Login ou senha incorretos!</p>
                                    <?php } ?>

                                    <?php if(isset($_GET['error']) && $_GET['error'] === 'emBranco'){ ?>
                                    <p class="text-center  mb-3 conteudoInputError" role="alert">Preencha os campos!</p>
                                    <?php } ?>

                                    <div class="form-outline mb-3 divsInputs" >
                                        <input type="text"class="form-control form-control-lg id="floatingInput" name="login" placeholder="Login"  required>
                                    </div>
                                    <div class="form-outline mb-3 divsInputs">
                                        <input type="password" class="form-control form-control-lg" id="senha" name="senha" placeholder="Senha"  required>
                                    </div>
                
                                    <div class="text-center">
                                        <input class="btn btn-outline-light btn-lg px-5 m-2" type="submit" name="entrar" value="Entrar">
                                    </div>
                                    <div>
                                        <p class="mb-0 text-center">Não tem uma conta? <a href="formCadastro.php" class="text-white-50 fw-bold">Cadastrar-se</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="./node_modules/jquery/dist/jquery.js"></script>
    <script src="./node_modules/parsleyjs/dist/parsley.min.js"></script>
    <script src="./node_modules/parsleyjs/dist/i18n/pt-br.js"></script>
    <link rel="stylesheet" href="./node_modules/parsleyjs/src/parsley.css">