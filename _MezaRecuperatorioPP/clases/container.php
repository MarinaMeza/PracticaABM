<?php
    class Container{
        public $nombre;
        public $correo;
        public $edad;
        public $clave;

        public function __construct($nombre = NULL, $correo = NULL, $edad = NULL, $clave = NULL){
            //if($descripcion != NULL){
                $this->nombre = $nombre;
                $this->correo = $correo;
                $this->edad = $edad;
                $this->clave = $clave;  
            //}
        }

        public function ToString(){
            return $this->numero." - ".$this->descripcion." - ".$this->pais." - ";
        }

        public function InsertarContainer(){//enUso
            $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso();

            $consulta = $objetoAccesoDatos->RetornarConsulta("INSERT into cliente (nombre,correo,edad,clave)values('$this->nombre','$this->correo','$this->edad','$this->clave')");

            $consulta->execute();
        }

        public static function TraerTodoLosContainer(){//enUso
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select nombre as nombre,correo as correo, edad as edad,clave as clave from container");
            $consulta->execute();   
            return $consulta->fetchAll(PDO::FETCH_CLASS, "Container");
        }

        public static function MostrarContainer(){
            $listaContainer = Container::TraerTodoLosContainer();
            
            $datos = "<ul>";
            foreach ($listaContainer as $key) {
                
                $datos .= "<li>";
                $datos .= $key->ToString();
                $datos .= "<img src="."$key->foto"." height=25% width=25% >";
                $datos .= "<button onclick="."modificar('$key->numero')"." class='btn btn-primary'>Modificar</button> ";
                $datos .= "<button onclick="."borrar('$key->numero')"." class='btn btn-danger'>Borrar</button>";
                $datos .= "</li>";
            }
            $datos .= "</ul>";
            return $datos;
        }

            public static function validarContainer(){
            $listaContainer = Container::TraerTodoLosContainer();
            
            $datos = "<ul>";
            foreach ($listaContainer as $key) {
                
                $datos .= "<li>";
                $datos .= $key->ToString();
                $datos .= "<img src="."$key->foto"." height=25% width=25% >";
                $datos .= "<button onclick="."modificar('$key->numero')"." class='btn btn-primary'>Modificar</button> ";
                $datos .= "<button onclick="."borrar('$key->numero')"." class='btn btn-danger'>Borrar</button>";
                $datos .= "</li>";
            }
            $datos .= "</ul>";
            return $datos;
        }

        public function BorrarContainer(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("
            delete 
            from container     
            WHERE numero=:numero"); 
            $consulta->bindValue(':numero',$this->numero, PDO::PARAM_INT);  
            $consulta->execute();
            return $consulta->rowCount();
        }

        public function ModificarContainer(){
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
            
            $consulta =$objetoAccesoDato->RetornarConsulta("
                update container 
                set descripcion='$this->descripcion',
                pais='$this->pais',
                foto='$this->foto'
                WHERE numero='$this->numero'");
            return $consulta->execute();            
        }

    }
?>