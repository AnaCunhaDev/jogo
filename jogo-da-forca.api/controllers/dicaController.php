<?php
    require '../data/DicaBd.php';

    $db = new DicaBd();
    $db->listarTodos();
    //$db->listarPorId(3);

   // $db->criarDica("Cor");
    //$db->AtualizarDica(3, "Carros");
   // $db->RemoverDica(1);


?>