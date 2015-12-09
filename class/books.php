<?php

class Books{
    
    public $objCon;


    public function __construct() { 
        
        //nos conectamos a la base de datos...
        require 'class/database.php';
        $this->objCon = new DataBase();
        
    }
    
    
 public function buscar($word = FALSE, $num = FALSE) {
     
     if($num == 1){
         $sth = $this->objCon->prepare('SELECT * FROM books WHERE titleB LIKE "%'.$word.'%" '
            . 'OR autorB LIKE "%'.$word.'%" OR descrB LIKE "%'.$word.'%" ');
         $sth->execute();
         return $sth->fetchAll();
     }  else {
         $sth = $this->objCon->prepare('SELECT *, MATCH (titleB, autorB, descrB) '
            . 'AGAINST (:words) FROM books WHERE MATCH (titleB, autorB, descrB) '
            . 'AGAINST (:words) ');
         $sth->execute(array(
             ':words' => $word
         ));
         return $sth->fetchAll();
     }
 }
    
    
}

