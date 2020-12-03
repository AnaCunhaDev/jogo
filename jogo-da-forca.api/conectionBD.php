<?php
/*
 * Melhor prática usando Prepared Statements
 *
 */
function connect(){
    try {
        $conn = new PDO('mysql:host=localhost;dbname=jogo-da-forca', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
       
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    return $conn;
}   
 ?>