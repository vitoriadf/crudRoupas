
<?php 
if(isset($_POST['entrar'])){
    if(isset($_POST['login']) && !empty($_POST['login'])  && isset($_POST['senha']) && !empty($_POST['senha'] && isset($_POST['senha']) && !empty($_POST['confimSenha']))){
        
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $confimSenha=$_POST['confimSenha'];

       if($confimSenha===$senha){

        require'../conecao.php';
        $sql = "INSERT INTO usuarios(login,senha) VALUES(:login,:senha)";
        $result = $conn->prepare($sql);
        $result->bindValue("login", $login);
        $result->bindValue("senha", $senha);
        $result->execute();
        header('location:../login.php?success=ok');
        }else{
            header('location:../formCadastro.php?error=nIndenticas');  
        }
    }else{
        header('location:../login.php?error=emBranco');

        }
}
?>
