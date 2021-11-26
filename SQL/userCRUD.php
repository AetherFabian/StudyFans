<?php
    require('SQL/connect.php');

    class CRUDuser{
        function insert($fName, $lName, $uName, $mail, $pass, $paypal, $birthDt, $desc){                
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            $sql = "CALL SP_create_user_and_channel('".$fName."','".$lName."','".$uName."','".$mail."','".$pass."',
                                            '".$paypal."','".$birthDt."','".$desc."')";
            if ($mysqli->query($sql)===TRUE){
                echo ("");
            } 
            else{
                echo("".$mysqli->error);
            }
        }
        function update($idU, $fName, $lName, $mail, $paypal, $birthDt, $desc){
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            $sql = "CALL SP_update_user('".$idU."','".$fName."','".$lName."','".$mail."'
                                            ,'".$paypal."','".$birthDt."','".$desc."')";
            if ($mysqli->query($sql)===TRUE){
                echo ("");
            } 
            else{
                echo("".$mysqli->error);
            }           
        }
        function login($id){
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            $sql = "CALL SP_show_update_user('".$id."')";
            if ($mysqli->query($sql)===TRUE){
                echo ("");
            } 
            else{
                echo("".$mysqli->error);
            }
        }
        function read($id){
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            $sql = "CALL SP_show_update_user('".$id."')";
            if ($mysqli->query($sql)===TRUE){
                echo ("");
            } 
            else{
                echo("".$mysqli->error);
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
                echo("".$mysqli->error);
            }
        }
        function delete($id){
            $mysqli = new conexion();
            $mysqli = $mysqli->conn();
            $sql = "CALL SP_delete_user('".$id."')";
            $result = $mysqli->query($sql);

            if ($mysqli->query($sql)===TRUE){
                echo ("");
            } 
            else{
                echo("".$mysqli->error);
            }   
        }
    }
?>