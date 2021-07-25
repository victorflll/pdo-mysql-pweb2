<?php
    include('connection.php');

    ?>
        <form method="POST" name="form" action="search.php">
            <br>
            <label for="search">Pesquisar por usuário: </label>
            <input type="text" name="search">
            <br>
            <button type="submit" value="Send">Buscar</button>
            <br>
        </form>
    <?php

    echo 'Nome dos usuários cadastrados';
    echo '<br/>'; echo '<br/>';

    $sql = $conn->prepare("SELECT `name` FROM `user`");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    for ($i=0; $i < count($result); $i++) { 
        echo "Usuário: ".($i+1)."<br>";
        foreach ($result[$i] as $key => $value) {
            echo $key.": ".$value."<br>";
        }
        echo "<br>";
    }
?>