<?php
    require('SQL/connect.php');

    class CRUDlike{
        function insert($id, $user, $video){                
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            $mysqli -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
            $sql = "CALL SP_new_like ('".$id."','".$user."','".$video."')";
            $result = $mysqli->query($sql);

            if ($result==FALSE){
                $mysqli->rollback();
                echo ("Falló el registro".$mysqli->error);
            } 
            else{
                $mysqli->commit();
                echo("Datos guardados");
            }
        }
        function read($fname, $lname, $uname, $mail, $paypal, $creationDt, $birthDt, $chName){
            $conexion = new conexion();
            $con = $conexion->conn();
            $sql = "";
            if ($con->query($sql)===TRUE){
                echo ("");
            } 
            else{
                echo("Falló el proceso".$con->error);
            }
        }
        function delete($user, $video){
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            $mysqli -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
            $sql = "CALL SP_delete_like ('".$user."','".$video."')";
            $result = $mysqli->query($sql);

            if ($result==FALSE){
                $mysqli->rollback();
                echo ("Falló el registro".$mysqli->error);
            } 
            else{
                $mysqli->commit();
                echo("Like eliminado");
            }
        }
    }
?>