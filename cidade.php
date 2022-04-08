<!DOCTYPE html>
<?php 
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    $title = "Cidades";
    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 1;
?>


<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
    
    <script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script> 

</head>
<body>
<center>
<ul class="menu">
        <li class="menu1"><a href="estado.php" class="menu1">ESTADOS</a></li>
        <li class="menu2"><a href="cidade.php" class="menu2">CIDADES</a></li>
        <li class="menu1"><a href="cadcid.php" class="menu1">NOVA CIDADE</a></li>
        <li class="menu2"><a href="cadest.php" class="menu2">NOVO ESTADO</a></li> 
</ul>
</center>    
<div class="container-fluid">
<br><br><br>
    <form method="post">
        <div class="form-group col-lg-3">
        <h3>Procurar Cidade</h3>
        <input type="text" name="procurar" id="procurar" size="50" class="form-control" value="<?php echo $procurar;?>"> <br>
        <button name="acao" id="acao" type="submit"  class="btn btn-outline-info">Procurar</button>
        <br><br>
        <p> Pesquisar por:</p><br>
        <form method="post" action="">
                <input type="radio" name="tipo" value="1" class="form-check-input" <?php if ($tipo == "1") echo "checked" ?>> ID<br>
                <input type="radio" name="tipo" value="2" class="form-check-input" <?php if ($tipo == "2") echo "checked" ?>> Nome da Cidade<br>
                <input type="radio" name="tipo" value="3" class="form-check-input" <?php if ($tipo == "3") echo "checked" ?>> Estado<br>
    </div>

    <br><br>
    </form>

    <table class="table table-hover">
            <tr><td><b>ID</b></td>
                <td><b>Cidade</b></td>
                <td><b>Estado</b></td>
                <td><b>Excluir</b></td>
                <td><b>Editar</b></td>
            </tr> 
    <?php
        $pdo = Conexao::getInstance(); 

        if($tipo == 1){
            $consulta = $pdo->query("SELECT * FROM estado, cidade WHERE cidade.id_cidade LIKE '$procurar%' AND estado.id_estado = cidade.id_estado ORDER BY  id_cidade");}
        else if($tipo == 2){
            $consulta = $pdo->query("SELECT * FROM estado, cidade WHERE cidade.nome_cid LIKE '$procurar%' AND estado.id_estado = cidade.id_estado ORDER BY nome_cid");}
        else if($tipo == 3){
            $consulta = $pdo->query("SELECT * FROM estado, cidade WHERE estado.nome_est LIKE '$procurar%' AND estado.id_estado = cidade.id_estado ORDER BY estado.id_estado");}
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   
        ?>
        <tr><td><?php echo $linha['id_cidade'];?></td>
            <td><?php echo $linha['nome_cid'];?></td>
            <td><?php echo $linha['nome_est'];?></td>
            <td><a href="javascript:excluirRegistro('acao.php?acao=excluir&id_cidade=<?php echo $linha['id_cidade'];?>')"><img class="icon" src="img/delete.png" alt="" width = 30 height = 30></a></td>
            <td><a href='cadest.php?acao=editar&id=<?php echo $linha['id_cidade'];?>'><img class="icon" src="img/edit.png" alt="" width = 30 height = 30></a></td>
        </tr>
    <?php } ?>       
    </table>
    </fieldset>
    </form>
            </div>
</body>
</html>