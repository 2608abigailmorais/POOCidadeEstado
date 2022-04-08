<?php
    class Cidade{
        private $id_cidade;
        private $nome_cid;
        private $id_estado;
        
        public function __construct($id, $cid, $idest){ 
            $this->id_cidade = $id;
            $this->nome_cid = $cid;
            $this->id_estado = $idest;
        }

        public function __toString(){
            $str = "ID da Cidade: ".$this->id_cidade.
            "<br>Nome da Cidade: ".$this->nome_cid.
            "<br>Estado: ".$this->id_estado;
            return $str;
        }

        public function inserir(){
            
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO cidade (nome_cid, id_estado) VALUES(:nome_cid, :id_estado)');
            $stmt->bindParam(':nome_cid', $this->nome_cid, PDO::PARAM_STR);
            $stmt->bindParam(':id_estado', $this->id_estado, PDO::PARAM_STR);
    
            return $stmt->execute();
            
        }

        public function editar($id_cidade){
            
            $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('UPDATE cidade SET nome_cid = :nome_cid, id_estado = :id_estado WHERE id_cidade = :id_cidade');
        $stmt->bindParam(':id_cidade', $id_cidade, PDO::PARAM_INT);
        $stmt->bindParam(':nome_cid', $this->nome_cid, PDO::PARAM_STR);
        $stmt->bindParam(':id_estado', $this->id_estado, PDO::PARAM_STR);
    

    
            return $stmt->execute();
            
        }


        function excluir($id_cidade){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM cidade WHERE id_cidade = :id_cidade');
            $stmt->bindParam(':id_cidade', $id_cidade);
            
            return $stmt->execute();
        }
       
}

?>