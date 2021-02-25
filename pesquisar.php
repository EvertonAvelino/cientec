<?php

require_once  ('./Models/DaoCidadao.php');
require_once  ('./Models/Cidadao.php');

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';

// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):

    $conexao = new Conexao();
	$sql = 'SELECT  nome,nis FROM pessoas';
	$stm = $conexao->getConn($sql);
else:

	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = new Conexao();

    $sql = 'SELECT  nome,nis FROM pessoas where nis LIKE :nis ';
    $smtp = Conexao::getConn()->prepare($sql);
   
	$smtp->bindValue(':nis', $termo.'%');  
	$smtp->execute();
	$cidadao = $smtp->fetchAll(PDO::FETCH_OBJ);

endif;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Listagem de Cidadão</title>

</head>

<body>
    <div>
        <fieldset>

            <!-- Cabeçalho da Listagem -->
            <legend>
                <h1>Listagem de Cidadao</h1>
            </legend>

            <!-- Formulário de Pesquisa -->
            <form action="" method="get">
                <label for="termo">Pesquisar</label>

                <input type="text" id="termo" name="termo" placeholder="Infome o NIS">

                <button type="submit">Pesquisar</button>

            </form>

            <?php if(!empty($cidadao)):?>

            <!-- Tabela com registro de cidadao -->
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Nis</th>
                </tr>
                <?php foreach($cidadao as $pessoa):?>
                <tr>
                    <td><?= $pessoa->nome?></td>
                    <td><?= $pessoa->nis?></td>
                    <td>
                </tr>
                <?php endforeach;?>
            </table>

            <?php else: ?>

            <!-- Mensagem caso não exista clientes ou não encontrado  -->
            <h3>Cidadão não encontrado.</h3>
            <?php endif; ?>
        </fieldset>
    </div>

</body>

</html>