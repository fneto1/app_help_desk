<?php

    session_start();

    $usuario_autenticado = false;
    $usario_id = null;
    $usuario_perfil_id = null;

    $perfis = array(
        array(1 => 'administrador'),
        array(2 => 'usuario'),
    );

    $usuarios_app = array(
        array('id' => 1, 'email' => 'adm@wandao.com', 'senha' => '1337', 'perfil_id' => 1),
        array('id' => 2,'email' => 'user@wandao.com', 'senha' => '1337', 'perfil_id' => 1),
        array('id' => 3,'email' => 'donpollo@autentica.com', 'senha' => '1337', 'perfil_id' => 2),
        array('id' => 4,'email' => 'papinho@autentica.com', 'senha' => '1337', 'perfil_id' => 2),
    );

    foreach($usuarios_app as $user){
        if($_POST['email'] == $user['email'] && $_POST['senha'] == $user['senha']){
            $usuario_autenticado = true;
            $usario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
    }

    if($usuario_autenticado){
        echo "Usuario autenticado";
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
    } else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro'); //força o redirecionamento e passa um parametro via get
    }

?>