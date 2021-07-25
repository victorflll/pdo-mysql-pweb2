<?php
    include('connection.php');
    include('user.php');
    
    if(empty($_POST['username']) || empty($_POST['password'])){
        header('Location: login.html');
        exit();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT `username`, `password` FROM `user` WHERE `username` = :username and `password` = :password");

    $stmt->bindparam(":username", $username);
    $stmt->bindValue(":password", md5($password));
    $stmt->execute();

    if($stmt->rowCount() == 0){
        echo "Usuário ou senha incorretas.";
        ?>
            <button><a href="login.html">Voltar</a></button>
        <?php
    }else{
        header("Location: list.php");
    }
?>