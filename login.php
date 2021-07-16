<?php
    include('connection.php');
    if(empty($_POST['username']) || empty($_POST['password'])){
        header('Location: login.html');
        exit();
    }

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $sql = "SELECT `username`,`password` FROM `user` WHERE 
    `username`='".$username."' and `password`='".md5($password)."'";

    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    if($count == 1) {
        echo "Login realizado com sucesso";
        header("Location: list.php");
        exit();
    }else{
        echo "Usuário ou senha incorretas.";
        exit();
    }

    $conn->close();
?>
