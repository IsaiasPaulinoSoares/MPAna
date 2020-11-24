<?php
session_start();
include('conexao.php');

if(empty($_POST['usrname']) || empty($_POST['psw'])) {
	header('Location: index.php');
	exit();
}

$usrnsme = mysqli_real_escape_string($conexao, $_POST['usrname']);
$senha = mysqli_real_escape_string($conexao, $_POST['psw']);

$query = "select Nome_U from usuario where usuario = '{$usrname}' and senha = md5('{$psw}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['usrname'] = $usuario_bd['usrname'];
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}