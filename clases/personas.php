<?php
    class Persona{
        public $_nombre;
        public $_apellido;
        public $_numero;

        public function __construct($pNombre,$pApellido,$pNumero){
            $this->_nombre = $pNombre;
            $this->_apellido = $pApellido;
            $this->_numero = $pNumero;
        }

        public function ToString(){
            return "$this->_nombre - $this->_apellido - $this->_numero";
        }

        public function GuardarPersona(){
            $arch = fopen("../archivos/personas.txt","a+");//a+ -> append + crear si no existe
            fwrite($arch,$this->ToString()."\r\n");
            fclose($arch);
        }

        public static function MostrarArchivo(){
            $arch = fopen("../archivos/personas.txt","r");
            $datos = "<ul>";
            while(!feof($arch)){
                $datos .= "<li>";
                $datos .= fgets($arch);
                $datos .= "</li>";
            }
            $datos .= "</ul>";
            fclose($arch);
            return $datos;
        }

        public static function TraerPersonasDeTxt(){
            $listaPersonas = array();

            $arch = fopen("../archivos/personas.txt","r");
            while(!feof($arch)){
                $linea = fgets($arch);
                $auxPersona = explode(" - ",$linea);
                $auxPersona[0] = trim($auxPersona[0]);
                
                if($auxPersona[0]!=""){
                    $listaPersonas[] = new Persona(trim($auxPersona[0]),trim($auxPersona[1]),trim($auxPersona[2]));
                }
            }
            fclose($arch);
            return $listaPersonas;
        }

        public static function MostrarPersonasVector(){
            $listaPersonas = Persona::TraerPersonasDeTxt();

            $datos = "<ul>";
            foreach ($listaPersonas as $key) {
                
                $datos .= "<li>";
                $datos .= $key->ToString();
                $datos .= "</li>";
            }
            $datos .= "</ul>";
            return $datos;
        }
    }
?>