<?php

require ('Cidadao.php');


class CidadaoDao{
    public function create(Cidadao $cid){
       $sql = 'INSERT INTO pessoas(nome,nis) VALUES (?,?)'; 

       $stmt = Conexao::getConn()->prepare($sql);
       $stmt->bindValue(1,$cid->getNome());
       $stmt->bindValue(2,$cid->getNis());
       $stmt->execute();
    }
}
 
?>