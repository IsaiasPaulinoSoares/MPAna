<?php
session_start();
if(!$_SESSION['usrname']) {
	header('Location: index.php');
	exit();
}