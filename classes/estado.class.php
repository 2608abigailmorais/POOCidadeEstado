<?php
    class Estado{
        private $id_estado;
        private $nome_est;
        private $sigla;
        
        public function __construct($id, $est, $sig){
            
            $this->id_estado = $id;
            $this->nome_est = $est;
            $this->sigla = $sig;
        }

        public function __toString(){
            $str = "ID do Estado: ".$this->id_estado.
            "<br>Nome do Estado: ".$this->nome_est.
            "<br>Sigla: ".$this->sigla;
            
            return $str;
        }
        
        public function inserir(){
            
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO estado (nome_est, sigla) VALUES(:nome_est, :sigla)');
            $stmt->bindParam(':nome_est', $this->nome_est, PDO::PARAM_STR);
            $stmt->bindParam(':sigla', $this->sigla, PDO::PARAM_STR);
    
            return $stmt->execute();
            
        }
        
        function editar($id_estado){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('UPDATE estado SET nome_est = :nome_est, sigla = :sigla WHERE id_estado = :id_estado');
            $stmt->bindParam(':id_estado', $id_estado, PDO::PARAM_INT);
            $stmt->bindParam(':nome_est', $this->nome_est, PDO::PARAM_STR);
            $stmt->bindParam(':sigla', $this->sigla, PDO::PARAM_STR);
        
    
            $stmt->execute();
        }

        function excluir($id_estado){   
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM estado WHERE id_estado = :id_estado');
            $stmt->bindParam(':id_estado', $id_estado);
            
            return $stmt->execute();
        }
      
    }



?>