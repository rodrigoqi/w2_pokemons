<?php
    class Pokemon{
        //PRIMEIRO: ATRIBUTOS (CARACTERISTICAS = VARIAVEIS)
        private $codigo;
        private $nome;
        private $descricao;
        private $foto;
        private $ataque;
        private $defesa;
        private $elemento;

        //SEGUNDO: MÉTODOS (AÇÕES = FUNCTIONS)

        //CONSTRUTOR: método que diz como um novo objeto da classe deve ser construido
        public function __construct($nome, $descricao, $foto, $ataque, $defesa){
            $this->nome = $nome;
            $this->descricao = $descricao;
            $this->foto = $foto;
            $this->ataque = $ataque;
            $this->defesa = $defesa;
            $this->elemento = "";
        }

        //GETTERS: métodos que devolvem o valor de um atributo
        public function getCodigo(){
            return $this->codigo;
        }
        
        public function getNome(){
            return $this->nome;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function getFoto(){
            return $this->foto;
        }

        public function getAtaque(){
            return $this->ataque;
        }

        public function getDefesa(){
            return $this->defesa;
        }

        public function getElemento(){
            return $this->elemento;
        }

        //SETTERS: métodos que permitem alterar o valor de um atributo
        public function setNome($novonome){
            $this->nome = $novonome;
        }

        public function setDescricao($novadescricao){
            $this->descricao = $novadescricao;
        }

        public function setFoto($novafoto){
            $this->foto = $novafoto;
        }

        public function setAtaque($novoataque){
            $this->ataque = $novoataque;
        }

        public function setDefesa($novadefesa){
            $this->defesa = $novadefesa;
        }

        public function setElemento($novoelemento){
            $this->elemento = $novoelemento;
        }

        //TOSTRING: método que retorna o objeto em forma de um texto
        public function __toString(){
            $texto = "";
            $texto = $texto . "Nome: " . $this->nome . "<br>";
            $texto = $texto . "Descrição: " . $this->descricao . "<br>";
            $texto = $texto . "Ataque: " . $this->ataque . "<br>";
            $texto = $texto . "Defesa: " . $this->defesa . "<br>";
            return $texto;
        }

        //MÉTODOS ESPECIAIS: qualquer método que não seja construct, get, set ou toString

    }


?>