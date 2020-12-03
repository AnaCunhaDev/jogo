<?php
    
    require '../base/baseDB.php';
    require '../models/palavra.php';    
  
    class PalavraBd{
        private $conn;
        private $palavraBD;

        function __construct()
        {
            $this->conn = connect();
            $this->palavraBD = new BaseBd();
        }

        function listarTodos(){

            $sql = "SELECT * FROM palavra";
    
            $rs =  $this->palavraBD->listarTodos($sql);

            while ($row = $rs->fetch(PDO::FETCH_OBJ)){
                echo $row->id ;
                echo " " . $row->palavra;
                echo " " . $row->dica . "<br/>";
            }
        }
        function listarPorId($id){

            $sql = "SELECT * FROM palavra WHERE id = " . $id;
    
            try{
                $rs =  $this->palavraBD->listarPorId($sql);
            }catch(Exception $e){
                echo 'ERROR: ' . $e->getMessage(); 
             
            }
    
            while ($row = $rs->fetch(PDO::FETCH_OBJ)){
                echo $row->id . "<br />";
                echo $row->palavra ;
            }
        }
        function criarPalavra($palavra){

           
            $sql = "INSERT INTO palavra (palavra) VALUES (:palavra)";           
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':palavra', $palavra);
            $this->palavraBD->criar($stmt);
             
                
        }
        function AtualizarPalavra($id, $palavra, $dica){

            $atual = new palavra($id, $palavra, $dica);            

            $sql = "UPDATE palavra SET palavra = :palavra WHERE id = :id";
            
            try{
                $stmt = $this->conn->prepare($sql);
                $stmt->bindValue(':palavra', $atual->Getpalavra());
                $stmt->bindValue(':id', $atual->GetId());
                $this->palavraBD->Atualizar($stmt);

            }catch(Exception $e){
                echo 'ERROR: ' . $e->getMessage(); 
             
            }          
        }
        function RemoverPalavra($id){

            $sql = "DELETE FROM palavra WHERE id = :id";
            $this->palavraBD->Remover($sql);               
        }
    }
 
?>