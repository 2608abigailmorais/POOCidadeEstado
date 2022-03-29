<?php
    class Cidade{
        private $cidId;
        private $cidNome;
        private $estadoId;
        
        public function __construct($id, $cid, $idest){ 
            $this->cidId = $id;
            $this->cidNome = $cid;
            $this->estadoId = $idest;
        }

        public function __toString(){
            $str = "ID da Cidade: ".$this->cidId.
            "<br>Nome da Cidade: ".$this->cidNome.
            "<br>Estado: ".$this->estadoId;
            return $str;
        }

        public function inserir(){
            
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO cidade (cidNome, estadoId) VALUES(:cidNome, :estadoId)');
            $stmt->bindParam(':cidNome', $this->cidNome, PDO::PARAM_STR);
            $stmt->bindParam(':estadoId', $this->estadoId, PDO::PARAM_STR);
    
            return $stmt->execute();
            
        }

        public function editar($cidId){
            
            $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE cidade SET cidNome = :cidNome, estadoId = :estadoId WHERE cidId = :cidId');
        $stmt->bindParam(':cidId', $cidId, PDO::PARAM_INT);
        $stmt->bindParam(':cidNome', $this->cidNome, PDO::PARAM_STR);
        $stmt->bindParam(':estadoId', $this->estadoId, PDO::PARAM_STR);
    

    
            return $stmt->execute();
            
        }


        function excluir($cidId){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM cidade WHERE cidId = :cidId');
            $stmt->bindParam(':cidId', $cidId);
            
            return $stmt->execute();
        }
       
}

?>