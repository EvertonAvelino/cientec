<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de cidadão</title>
</head>

<body>
    <form action="?act=save" method="POST" name="form1">
        <h1>Cadastro de cidadão</h1>
        <hr>
        Nome:
        <input type="text" name="nome" if (isset($nome) && $nome !=null || $nome !="" ){ echo "value=\" {$nome}\""; } ?>
        <input type="submit" value="salvar" /><br>
        <a href="pesquisar.php">Pesquisar</a>
        <hr>
    </form>


</body>

</html>
<?php 

require_once  ('./Models/DaoCidadao.php');
require_once  ('./Models/Cidadao.php');


$cidadao = new Cidadao();
$cidadaoDao = new CidadaoDao();
$nis = rand(0000000000,99999999999);
$cidadao->setNome($_POST['nome']);
$verificar = array('SELECT * FROM pessoas');

foreach($verificar as $repete){
    if(($repete == $nis) && ($repete == $nome)){
        echo 'cidadão ja esta cadastrado';
    }else{
    $cidadao->setNis($nis);
    $cidadaoDao->create($cidadao);

    }
}

?>