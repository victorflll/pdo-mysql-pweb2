<?php
    include('connection.php');

    if(empty($_POST['search'])){
        header('Location: list.php');
        exit();
    }

    $search = $_POST['search'];

    $stmt = $conn->prepare("SELECT `username` FROM `user` WHERE `username` = :look");

    $stmt->bindparam(":look", $search);
    $stmt->execute();

    if($stmt->rowCount() == 0){
        echo "Usuário não encontrado ou inexistente.<br>";
    }else{
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "Usuário: <br>";
        foreach ($result as $key => $value) {
            echo $key.": ".$value."<br>";
        }
        echo "<br>";
    }
    
    ?>
        <button><a href="list.php">Voltar</a></button>
    <?php
?>