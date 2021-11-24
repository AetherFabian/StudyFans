<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/uploadvideo.css">
    <script src="https://kit.fontawesome.com/19fdbc0fa6.js" crossorigin="anonymous"></script>
    <title>Subir Videos</title>
</head>
<body>
  <?php  //include('partials/header.php') ?>

    <form action="#" method="POST" enctype="multipart/form-data">
        <h2>Informacion del video</h2>
        <div class="text_form">
        <input class="text_form my-3" type="text" name="title" id="title" placeholder="Título" >
        <textarea class="text_form my-3" name="description" id="description" placeholder="Descripción del video"></textarea>
        <input class="text_form my-3" type="text" name="privacy" id="privacy" placeholder="Privacidad" >
        </div>
        <p><strong>Miniatura</strong></p>
        <input type="file" name="miniature" id="miniature" class="my-1"/>
        <p><strong>Archivo de video</strong></p>
        <input type="file" name="filename" id="filename" class="my-2"/>
        <input type="submit" value="Upload" name="upload" id="upload" class="text_form"/>
    </form>
    <?php 
        include('SQL/videosCRUD.php');
        $mysqli = new CRUDvideo();
        
        if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['privacy'])
            && isset($_FILES['miniature']['name']) && isset($_FILES['filename']['name'])){
            $title=$_POST['title'];
            $desc=$_POST['description'];
            $stat=$_POST['privacy'];
            $miniature = $_FILES['miniature']['name'];
            $fileN = $_FILES['filename']['name'];

            $locationM = "Files/miniatures/".$miniature;
            $locationF = "Files/videos/".$fileN;
            if( move_uploaded_file($_FILES['filename']['tmp_name'], $locationF)){
                echo '<p>File uploaded succesfully</p>';
            } else {
                echo '<b>Error uploading file.</b>';
            }
            $fileN = $_FILES['filename']['name'];
            $locationF = "Files/videos/".$fileN;
            if( move_uploaded_file($_FILES['miniature']['tmp_name'], $locationM)){
                echo '<p>File uploaded succesfully</p>';
            } else {
                echo '<b>Error uploading the files.</b>';
            }
            
            $mysqli->insert($title, $desc, $stat, $owner=7, $miniature, $fileN);
        }
    ?>
</body>
</html>
