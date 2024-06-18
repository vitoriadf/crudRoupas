<?php 
    if(isset($_POST['entrar'])){
        if(isset($_POST['login']) && !empty($_POST['login']) &&  isset($_POST['senha']) && !empty($_POST['senha'])){
            $login = $_POST['login'];
            $senha = $_POST['senha'];
       
            session_start();
            require'../conecao.php';
            $sql = "SELECT * FROM usuarios WHERE login = :login && senha = :senha";
            $result = $conn->prepare($sql);
            $result->bindValue("login", $login);
            $result->bindValue("senha", $senha);
            $result->execute();
        
      
            if($result->rowCount() > 0){
                $dadoRecebido=$result-> fetch();
                $_SESSION['id'] = $dadoRecebido['id'];
                header('location:../index.php');


            }else{
                header('location:../login.php?error=erro');
            }
        }else{
            header('location:../login.php?error=emBranco');

            }
        }?> 
          
    
