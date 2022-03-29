<?php
    class Estado{
        private $estId;
        private $estNome;
        private $estSigla;
        
        public function __construct($id, $est, $sig){
            
            $this->estId = $id;
            $this->estNome = $est;
            $this->estSigla = $sig;
        }

        public function __toString(){
            $str = "ID do Estado: ".$this->estId.
            "<br>Nome do Estado: ".$this->estNome.
            "<br>Sigla: ".$this->estSigla;
            
            return $str;
        }
        
        public function inserir(){
            
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO estado (estNome, estSigla) VALUES(:estNome, :estSigla)');
            $stmt->bindParam(':estNome', $this->estNome, PDO::PARAM_STR);
            $stmt->bindParam(':estSigla', $this->estSigla, PDO::PARAM_STR);
    
            return $stmt->execute();
            
        }
        
        function editar($estId){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('UPDATE estado SET estNome = :estNome, estSigla = :estSigla WHERE estId = :estId');
    
            $stmt->bindParam(':estId', $estId, PDO::PARAM_INT);
            $estId = $_POST['estId'];
    
            $stmt->bindParam(':estNome', $estNome, PDO::PARAM_STR);
            $estNome = $_POST['estNome'];
    
            $stmt->bindParam(':estSigla', $estSigla, PDO::PARAM_STR);
            $estSigla = $_POST['estSigla'];
    
            $stmt->execute();
        }

        function excluir($estId){
            $pdo = Conexao::getInstance();
            $stmt = $pdo ->prepare('DELETE FROM estado WHERE estId = :estId');
            $stmt->bindParam(':estId', $estId);
            
            return $stmt->execute();
        }
      
        // id //

        public function getID(){
            if ($this->estId != "")
            return $this->estId;
           else
          return "Não informado";
    
            }
            
            public function setID($novoID){
                $this->estId = $novoID;
        }   
    
        public function setEstadoID ($estadoID){
        $this->estId = $estadoID;
        }

        public function getNome(){
        if ($this->estNome != "")
        return $this->estNome;
       else
      return "Não informado";

        }
        
        public function setNome($novoNome){
            $this->estNome = $novoNome;
    }   

    public function setEstadoNome ($estadonome){
    $this->estNome = $estadonome;
    }

      // sigla //

      public function getSigla(){
        if ($this->estSigla != "")
        return $this->estSigla;
       else
      return "Não informado";

        }
        
        public function setSigla($novaSigla){
            $this->estSigla = $novaSigla;
    }   

    public function setEstadoSigla ($estadosigla){
    $this->estSigla = $estadosigla;
    }
    //
    }



?>