<?php
    include('connection.php');
    $sql = "SELECT `name` FROM `user`";
    $result = $conn->query($sql);

    echo 'Nome dos usuários cadastrados';
    echo '<br/>';

    while($row = $result->fetch_array()) {
        echo $row['name'];
        echo '<br/>';
    }
?>