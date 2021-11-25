<?php
    require('SQL/connect.php');

    class CRUDcomment{
        function insert($user, $video, $content){                
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            $mysqli -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
            $sql = "CALL SP_create_comment('".$user."','".$video."',CURENT_TIMESTAMP,'".$content."')";
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
        function update($user, $video, $content){
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            $mysqli -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
            $sql = "CALL SP_update_comment('".$user."','".$video."',CURRENT_TIMESTAMP,'".$content."')";
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
        function delete($id){
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            $mysqli -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
            $sql = "CALL SP_delete_comment('".$id."')";
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
    }
?>