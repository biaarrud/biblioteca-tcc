<?php
include("config.php");

$conexao = mysqli_connect(SERVIDOR, Cliente, SENHA, BANCO) or 
    die("error ao conctar" . mysqli_connect_error());