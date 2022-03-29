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
        <li class="menu1"><a href="cad1.php" class="menu1">NOVA CIDADE</a></li>
        <li class="menu2"><a href="cad2.php" class="menu2">NOVO ESTADO</a></li> 
</ul>
</center>
    

    <div class="container-fluid">
<br><br><br>
    <form method="post">

                    <div class="form-group col-lg-3">
                    <h3>Procurar Cidade</h3>
                    <input type="text" name="procurar" id="procurar" size="50" class="form-control" 
                value="<?php echo $procurar;?>"> <br>
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
            $consulta = $pdo->query("SELECT * FROM estado, cidade 
                                WHERE cidId LIKE '$procurar%' 
                                AND estado.estId = estadoId
                                ORDER BY  cidId");}

        else if($tipo == 2){
            $consulta = $pdo->query("SELECT * FROM estado, cidade 
                                WHERE cidade.cidId LIKE '$procurar%' 
                                AND estado.estId = estadoId
                                ORDER BY cidade.cidNome");}

        else if($tipo == 3){
            $consulta = $pdo->query("SELECT * FROM estado, cidade 
                                WHERE cidade.cidId LIKE '$procurar%' 
                                AND estado.estId = estadoId
                                ORDER BY estado.estId");}


    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {   
        
        ?>
        <tr><td><?php echo $linha['cidId'];?></td>
            <td><?php echo $linha['cidNome'];?></td>
            <td><?php echo $linha['estNome'];?></td>
            <td><?php echo " <a href=javascript:excluirRegistro('acao.php?acao=excluir&cidId={$linha['cidId']}')>"; ?><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
  <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
</svg></a></td>
        <td><?php echo "<a href='cad1.php?acao=editar&cidId={$linha['cidId']}')>";?><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wrench" viewBox="0 0 16 16">
  <path d="M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364L.102 2.223zm13.37 9.019.528.026.287.445.445.287.026.529L15 13l-.242.471-.026.529-.445.287-.287.445-.529.026L13 15l-.471-.242-.529-.026-.287-.445-.445-.287-.026-.529L11 13l.242-.471.026-.529.445-.287.287-.445.529-.026L13 11l.471.242z"/>
</svg></a></td>
  
        
        </tr>
    <?php } ?>       
    </table>
    </fieldset>
    </form>
    
            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>