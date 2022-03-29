<!DOCTYPE html>

<?php
    include_once "acaoI.php";
    $acaoI = isset($_GET['acaoI']) ? $_GET['acaoI'] : "";
    $dados;
    if ($acaoI == 'editar'){
        $estId = isset($_GET['estId']) ? $_GET['estId'] : "";
    if ($estId > 0)
        $dados = buscarDados($estId);
}
    $title = "Cadastro de Cidades";
    $estNome = isset($_POST['estNome']) ? $_POST['estNome'] : "";
    $estSigla = isset($_POST['estSigla']) ? $_POST['estSigla'] : "";


//var_dump($dados);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">

</head>


<body>
<br>
<div class="container-fluid">
<h3>Novo Estado</h3>
        <form method="post" action="acaoI.php">
        <div class="form-group col-lg-3">

        ID do Estado:
        <input readonly  type="text" name="estId" id="estId" class="form-control" value="<?php if ($acaoI == "editar") echo $dados['estId']; else echo 0; ?>"><br>
        Nome:
        <input name="estNome" id="estNome" type="text" required="true" class="form-control" value="<?php if ($acaoI == "editar") echo $dados['estNome']; ?>"><br>  
        Sigla:
        <input name="estSigla" id="estSigla" type="text" required="true" class="form-control" value="<?php if ($acaoI == "editar") echo $dados['estSigla']; ?>"maxlength="2" minlength="2"><br>
    <button name="acaoI" value="salvar" id="acaoI" type="submit" class="btn btn-outline-secondary">Salvar</button>       
    </form>
</div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

