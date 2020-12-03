<?php
class palavra{
    private $id;
    private $palavra;  
    private $dica;
    
    function __construct($id, $palavra, $dica)
    {
        $this->id = $id;
        $this->palavra = $palavra;
        $this->dica = $dica;
    }
    public function GetId(){
        return $this->id;
    }
    public function Getpalavra(){
        return $this->palavra;
    }
    public function Setpalavra($palavra){
        $this->palavra = $palavra;
    }
    public function GetDica(){
        return $this->dica;
    }
    public function SetDica($dica){
        $this->dica = $dica;
    }
   
}

?>