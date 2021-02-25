<?php
require ('./Models/Conexao.php');


class Cidadao {

    private $id;
    private $nome;
    private $nis;

   
     public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->nome = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNis() {
        return $this->nis;
    }

    public function setNis($nis) {
        $this->nis=$nis;

    }

  
}

?>