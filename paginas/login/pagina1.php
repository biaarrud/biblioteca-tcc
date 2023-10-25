<?php
session_start();
echo"<h1>pagina 1</h1>";
echo "id: " . session_id() . "<br>";

$_SESSION['username'] =  "bia";
$_SESSION['senha'] = "261005";

echo $_SESSION['username'] . "<br>";
echo $_SESSION['senha'] . "<br>";
?>