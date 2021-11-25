<?php
  session_start();

  include 'SQL/database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('CALL `SP_read_user` ("'.$_SESSION['user_id'].'")');
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $id = null;

    if (count($results) > 0) {
      $id = $results;
    }
    $idU = $id['id_user'];
  }
?>