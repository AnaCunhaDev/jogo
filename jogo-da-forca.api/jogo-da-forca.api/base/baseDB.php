<?php
    
    require '../conectionBD.php';       
  
    class BaseBd{
        private $conn;        

        function __construct()
        {
            $this->conn = connect();            
        }

        function listarTodos($sql){
   
            try{
                $rs = $this->conn->query($sql);
            }catch(Exception $e){
                echo 'ERROR: ' . $e->getMessage(); 
             
            }
            return $rs;            
        }
        function listarPorId($sql){ 
    
            try{
                $rs = $this->conn->query($sql);
            }catch(Exception $e){
                echo 'ERROR: ' . $e->getMessage(); 
             
            }
            return $rs;    
            
        }
        function criar($stmt){            
            
            try{
                $rs = $stmt->execute();
                echo 'Cadastro com sucesso';

            }catch(Exception $e){
                echo 'ERROR: ' . $e->getMessage(); 
             
            }          
        }
        function Atualizar($stmt){          
            
            try{
                
                $rs = $stmt->execute();
                echo 'Atualização com sucesso';

            }catch(Exception $e){
                echo 'ERROR: ' . $e->getMessage(); 
             
            }          
        }
        function Remover($sql){   
            
            try{
                $stmt = $this->conn->prepare($sql);                
                $rs = $stmt->execute();
                echo 'Excluido com sucesso';

            }catch(Exception $e){
                echo 'ERROR: ' . $e->getMessage(); 
             
            }          
        }
    }
 
?>