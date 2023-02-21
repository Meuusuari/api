<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('BD', 'sucesso');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, BD) or die ('Nao conectou!!!!')

?>