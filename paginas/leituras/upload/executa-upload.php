<?php
set_time_limit(0);

include("../../../db/conexao.php");

$extensoes_validas = array(".jpg", ".png", ".bmp");
$caminho_absoluto = "../img-leitura";
$tamanho_bytes = 5000000;

if (isset($_FILES["arquivo"]["name"])):
    $idLeitura = $_POST["idLeitura"];
    $nome_arquivo = $_FILES["arquivo"]["name"];
    $extensao = strrchr($nome_arquivo, ".");
    $tamanho_arquivo = $_FILES["arquivo"]["size"];
    $arquivo_temporario = $_FILES["arquivo"]["tmp_name"];
    $nome_arquivo_novo = $idLeitura . $extensao;
    if ($tamanho_arquivo > $tamanho_bytes):
        die("O arquivo deve ter no máximo {$tamanho_bytes} bytes.;aviso");
    endif;

    if (!in_array($extensao, $extensoes_validas)):
        die("Extensão Inválida;aviso");
    endif;

    if(move_uploaded_file($arquivo_temporario, "$caminho_absoluto/$nome_arquivo_novo")):
        $sql = "UPDATE tbleituras SET imgLeitura = '{$nome_arquivo_novo}' WHERE idLeitura = '{$idLeitura}'";
        mysqli_query($conexao, $sql);
        echo "./paginas/leituras/img-leitura/{$nome_arquivo_novo};concluido";
    else:
        die("O arquivo não pôde ser copiado para o servidor;erro");
    endif;    
else:
    die("Selecione uma imagem para upload!;aviso");
endif;
?>