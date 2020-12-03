<?php
class Dica{
    private $id;
    private $dica;  
    
    function __construct($id, $dica)
    {
        $this->id = $id;
        $this->dica = $dica;
    }
    public function GetId(){
        return $this->id;
    }
    public function GetDica(){
        return $this->dica;
    }
    public function SetDica($dica){
        $this->dica = $dica;
    }
}

?>