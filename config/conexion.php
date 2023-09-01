<?php
    session_start();
    // Iniciamos Clase Conectar
    class Conectar{
        protected $dbh;

        // Funcion Protegida de la cade Conexión
        protected function conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=sistema_examen","root","");
                return $conectar;
            }catch(Exception $e){
                // En caso que hubiera un error en la cadena conexión
                print "Error" .$e->getMessage() . "<br>";
                die();
            }
        }

        // Para impedir que tengamos problemas con las ñ o tildes
        public function set_names(){
            return $this->conexion()->query("SET NAMES 'utf8'");
        }
        
        // Ruta principal del proyecto
        public static function ruta(){
            return "http://localhost/Examen_Timbox/";
        }
    }

?>