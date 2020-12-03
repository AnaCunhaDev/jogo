<?php
    require '../data/PalavraBd.php';

    $db = new PalavraBd();
    $db->listarTodos();
    //$db->listarPorId(3);

   // $db->criarDica("Cor");
    //$db->AtualizarDica(3, "Carros");
   // $db->RemoverDica(1);


?>