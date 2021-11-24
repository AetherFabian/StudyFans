<?php
    require('SQL/connect.php');

    class CRUDvideo{
        function insert($title, $desc, $stat, $owner, $miniature, $fileN){                
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            //$mysqli -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
            
            $sql = "CALL SP_create_video('".$title."','".$desc."','".$stat."'
                                    ,'".$owner."','".$miniature."','".$fileN."')";
            /*if ($mysqli->query($sql)===TRUE){
                echo ("<p>Lo lograste</p>");
            } 
            else{
                echo("Falló el proceso".$mysqli->error);
            }*/
            $result = $mysqli->query($sql);

            if ($result==FALSE){
                $mysqli->rollback();
                echo ("Falló el registro".$mysqli->error);
            } 
            else{
                $mysqli->commit();
                echo("<p>Datos Guardados</p>");
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
        function update($id, $title, $desc, $stat){
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            $mysqli -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
            $sql = "CALL SP_update_video('".$id."','".$title."','".$desc."','".$stat."')";
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
            $sql = "CALL SP_delete_video('".$id."')";
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