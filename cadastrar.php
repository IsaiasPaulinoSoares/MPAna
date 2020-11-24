<?php
session_start();
include("conexao.php");

$usrname = mysqli_real_escape_string($conexao, trim($_POST['usrname']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$psw = mysqli_real_escape_string($conexao, trim(md5($_POST['psw'])));
$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$tel = mysqli_real_escape_string($conexao, trim($_POST['tel']));


$sql = "select count(*) as total from usuario where CNPJ_CPF_U = '$cpf'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

$sql = "INSERT INTO usuario (Nome_U, Email_U, Tel_U, CNPJ_CPF_U, Email_Log //) VALUES ('$usrname', '$email', '$tel', '$cpf', $psw NOW())";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();
exit;
?>