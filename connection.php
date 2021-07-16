<?php
    $hostname = "localhost";
    $db = "avaliacaopweb2";
    $username = "root";
    $password = "root";

    $conn = new mysqli($hostname, $username, $password, $db);

    if ($conn->connect_error) {
      die("Conexão não realizada: " . $conn->connect_error);
    }
?>