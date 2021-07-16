<?php
    include('connection.php');
    if(empty($_POST['name']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])){
        header('Location: register.html');
        exit();
    }

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $i = 0;

    $sql = "INSERT INTO `user`(`name`, `username`, `email`, `password`) 
    VALUES('".$name."','".$username."','".$email."','".md5($password)."')";

    $fetch = "SELECT `username`,`email` FROM `user`";
    $result = $conn->query($fetch);
    while($row = $result->fetch_array()) {
        if($row['username'] == $username || $row['email'] == $email){
            $i++;
        }
    }

    if($i>0){
        echo "Usuário ou E-mail já existentes.";
        header("Location: register.html");
        exit();
    }else{
        if ($conn->query($sql) === TRUE) {
            echo "Cadastro realizado com sucesso.";
            header("Location: login.html");
            exit();
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>