<?php
    
    require '../base/baseDB.php';
    require '../models/dica.php';    
  
    class DicaBd{
        private $conn;
        private $dicaBD;

        function __construct()
        {
            $this->conn = connect();
            $this->dicaBD = new BaseBd();
        }

        function listarTodos(){

            $sql = "SELECT * FROM dica";
    
            $rs =  $this->dicaBD->listarTodos($sql);

            while ($row = $rs->fetch(PDO::FETCH_OBJ)){
                echo $row->id ;
                echo " " . $row->dica . "<br />";
            }
        }
        function listarPorId($id){

            $sql = "SELECT * FROM dica WHERE id = " . $id;
    
            try{
                $rs =  $this->dicaBD->listarPorId($sql);
            }catch(Exception $e){
                echo 'ERROR: ' . $e->getMessage(); 
             
            }
    
            while ($row = $rs->fetch(PDO::FETCH_OBJ)){
                echo $row->id . "<br />";
                echo $row->dica ;
            }
        }
        function criarDica($dica){

           
            $sql = "INSERT INTO dica (dica) VALUES (:dica)";           
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':dica', $dica);
            $this->dicaBD->criar($stmt);
             
                
        }
        function AtualizarDica($id, $dica){

            $atual = new Dica($id, $dica);            

            $sql = "UPDATE dica SET dica = :dica WHERE id = :id";
            
            try{
                $stmt = $this->conn->prepare($sql);
                $stmt->bindValue(':dica', $atual->GetDica());
                $stmt->bindValue(':id', $atual->GetId());
                $this->dicaBD->Atualizar($stmt);

            }catch(Exception $e){
                echo 'ERROR: ' . $e->getMessage(); 
             
            }          
        }
        function RemoverDica($id){

            $sql = "DELETE FROM dica WHERE id = :id";
            $this->dicaBD->Remover($sql);               
        }
    }
 
?>