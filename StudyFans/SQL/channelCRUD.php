<?php
    require('SQL/connect.php');

    class CRUDchannel{
        function insert($owner, $name, $numSubs, $info){                
            $conexion = new conexion();
            $con = $conexion->conn();
            $sql = "CALL SP_create_channel('".$owner."','".$name."','".$numSubs."','".$info."')";
            if ($con->query($sql)===TRUE){
                echo ("Canal creado correctamente");
            } 
            else{
                echo("Fallo en el registro".$con->error);
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
                echo("Fallo en el proceso".$con->error);
            }
        }
        function update($name, $info){
            $conexion = new conexion();
            $con = $conexion->conn();
            $sql = "CALL SP_update_channel('".$name."','".$info."')";
            if ($con->query($sql)===TRUE){
                echo ("Los datos del canal se han actualizado");
            } 
            else{
                echo("Fallo en el proceso".$con->error);
            }
        }
        function delete($id){
            $conexion = new conexion();
            $con = $conexion->conn();
            $sql = "CALL SP_delete_channel('".$id."')";
            if ($con->query($sql)===TRUE){
                echo ("Canal Eliminado");
            } 
            else{
                echo("Fallo en el proceso".$con->error);
            }
        }
    }
?>