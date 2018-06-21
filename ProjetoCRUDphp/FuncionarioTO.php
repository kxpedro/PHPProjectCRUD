<?php

class FuncionarioTO{
    private $id;
    private $nome;
    private $nasc;
    private $sal;
    private $foto;
            
    function getNome() {
        return $this->nome;
    }

    function getNasc() {
        return $this->nasc;
    }

    function getSal() {
        return $this->sal;
    }

    function getFoto() {
        return $this->foto;
    }

    function getId() {
        return $this->id;
    }

    function __construct($nome, $nasc, $sal, $foto,$id=null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->nasc = $nasc;
        $this->sal = $sal;
        $this->foto = $foto;
    }



}
