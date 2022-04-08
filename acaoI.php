<?php

    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    
    $acaoI = isset($_GET['acaoI']) ? $_GET['acaoI'] : "";
    if ($acaoI == "excluir"){
        $id_estado = isset($_GET['id_estado']) ? $_GET['id_estado'] : 0;
        require_once ("classe/estado.class.php");
        $estado = new Estado("", "", "");
        $resultado = $estado->excluir($id_estado);
            header("location:estado.php");
    }
    

   
    $acaoI = isset($_POST['acaoI']) ? $_POST['acaoI'] : "";
    if ($acaoI == "salvar"){
        $id_estado = isset($_POST['id_estado']) ? $_POST['id_estado'] : "";
        if ($id_estado == 0){
            require_once ("classe/estado.class.php");

            $estado = new Estado("", $_POST['nome_est'], $_POST['sigla']);
            
            $resultado = $estado->inserir();
            header("location:estado.php");
        }
        else
        require_once ("classe/estado.class.php");

        $estado = new Estado("", $_POST['nome_est'], $_POST['sigla']);
        
        $resultado = $estado->editar($id_estado);
        header("location:estado.php");
    }
    

//Consultar dados
    function buscarDados($id_estado){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM estado WHERE id_estado = $id_estado");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id_estado'] = $linha['id_estado'];
            $dados['nome_est'] = $linha['nome_est'];
            $dados['sigla'] = $linha['sigla'];

        }
        //var_dump($dados);
        return $dados;
    }

    
?>