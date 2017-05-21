<?php
    class Container{
        public $numero;
        public $descripcion;
        public $pais;
        public $foto;

        public function __construct($numero, $descripcion, $pais, $foto){
            $this->numero = $numero;
            $this->descripcion = $descripcion;
            $this->pais = $pais;
            $this->foto = $foto;  
        }

        public function ToString(){
            return $this->numero." - ".$this->descripcion." - ".$this->pais." - ".$this->foto;
        }

        public function InsertarContainer(){
            $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();

            $consulta = $objetoAccesoDatos->RetornarConsulta("INSERT into container (numero,descripcion,pais,foto)values('$this->numero','$this->descripcion','$this->pais','$this->foto')");

            $consulta->execute();
        }
    }
?>