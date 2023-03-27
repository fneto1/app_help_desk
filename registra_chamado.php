<?php

    session_start();

    $texto = $_SESSION['id'].'#'.implode('#', $_POST).PHP_EOL;

    //abrindo o arquivo
    $arquivo = fopen('arquivo.txt', 'a');

    //registrando a chamada
    fwrite($arquivo, $texto);

    //fechando o arquivo
    fclose($arquivo);

    header('Location: abrir_chamado.php')

?>