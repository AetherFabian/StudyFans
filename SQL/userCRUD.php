<?php
    require('SQL/connect.php');

    class CRUDuser{
        function insert($fName, $lName, $uName, $mail, $pass, $paypal, $birthDt, $desc){                
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            //$mysqli -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
            $sql = "CALL SP_create_user_and_channel('".$fName."','".$lName."','".$uName."','".$mail."','".$pass."',
                                            '".$paypal."','".$birthDt."','".$desc."')";
            if ($mysqli->query($sql)===TRUE){
                echo ("Lo lograste");
            } 
            else{
                echo("Falló el proceso ".$mysqli->error);
            }
            /*$result = $mysqli->query($sql);

            if ($result==FALSE){
                $mysqli->rollback();
                echo ("Falló el registro".$mysqli->error);
            } 
            else{
                $mysqli->commit();
                echo("Datos guardados");
            }*/
        }
        function login($id){
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            $sql = "CALL SP_show_update_user('".$id."')";
            if ($mysqli->query($sql)===TRUE){
                echo ("");
            } 
            else{
                echo("Falló el proceso".$mysqli->error);
            }
        }
        function read($id){
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            $sql = "CALL SP_show_update_user('".$id."')";
            if ($mysqli->query($sql)===TRUE){
                echo ("Lo lograste");
            } 
            else{
                echo("Falló el proceso".$mysqli->error);
            }
        }
        function showUpdateUser($id){
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            $sql = "CALL SP_show_update_user('".$id."')";
            if ($mysqli->query($sql)===TRUE){
                echo ("");
            } 
            else{
                echo("Falló el proceso".$mysqli->error);
            }
        }
        function update($idU, $fName, $lName, $mail, $paypal, $birthDt, $desc){
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            //$mysqli -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
            $sql = "CALL SP_update_user('".$idU."','".$fName."','".$lName."','".$mail."'
                                            ,'".$paypal."','".$birthDt."','".$desc."')";
            
            if ($mysqli->query($sql)===TRUE){
                echo ("Lo lograste");
            } 
            else{
                echo("Falló el proceso".$mysqli->error);
            }                               
            /*$result = $mysqli->query($sql);

            if ($result==FALSE){
                $mysqli->rollback();
                echo ("Falló el registro".$mysqli->error);
            } 
            else{
                $mysqli->commit();
                echo("Datos guardados");
            }*/
        }
        function delete($id){
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            $mysqli -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);
            $sql = "CALL SP_delete_user('".$id."')";
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