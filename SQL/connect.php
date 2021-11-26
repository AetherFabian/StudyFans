<?php
    class conexion{
        function conn(){
            $server="localhost";
            $user="root";
            $pass="";
            $db="db_study_fans";

            $mysqli = new mysqli($server,$user,$pass,$db);

            if($mysqli->connect_errno){
                die("Falló la conexión a la base de datos".
                $mysqli->connect_errno);
            }
            else{
                return $mysqli;
            }
            $mysqli -> set_charset("utf-8");        
            $mysqli -> autocommit(FALSE); 
        }
    }
?>
