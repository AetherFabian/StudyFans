<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="row mt-5 mx-3">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="#" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control"
                        name="title" id="title" placeholder="Title">
                        <input type="text" class="form-control"
                        name="desc" id="desc" placeholder="Description">
                        <input type="text" class="form-control mt-2"
                        name="stat" id="stat" placeholder="Privacity">
                        <input type="text" class="form-control"
                        name="owner" id="owner" placeholder="Owner">
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" class="btn btn-success mt-2" value="Add">
                    </div>
                </form>
                <?php 
                require('SQL/videosCRUD.php');
                $conexion = new CRUDvideo();
                if(isset($_POST['title']) && isset($_POST['desc']) && isset($_POST['stat'])  
                    && isset($_POST['owner'])){
                    $title=$_POST['title'];
                    $desc=$_POST['desc'];
                    $stat=$_POST['stat'];
                    $owner=$_POST['owner'];
                    $conexion->insert($title, $desc, $stat, $owner, $miniature, $fileN);
                }
                ?>
            </div>
        </div>
</body>
</html>