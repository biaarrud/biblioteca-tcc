<?php
$senha= "261005";
$senhaCripo = hash('sha256', $senha);

var_dump($senha);
echo "<br>";
var_dump($senhaCripo);
?>