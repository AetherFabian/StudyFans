        <?php
        include("config.php");
     
        if(isset($_POST['but_upload'])){
            $maxsize = 5242880; // 5MB
                       
            $name = $_FILES['file']['name'];
            $target_dir = "videos/";
            $target_file = $target_dir . $_FILES["file"]["name"];

            // Select file type
            $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

            // Check extension
            if( in_array($videoFileType,$extensions_arr) ){
                
                // Check file size
                if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                    echo "Nomas puedes subir 5MB Carnal.";
                }else{
                    // Upload
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                        // Insert record
                        $query = "INSERT INTO videos(name,location) VALUES('".$name."','".$target_file."')";

                        mysqli_query($con,$query);
                        echo "Se Guardo al 100.";
                    }
                }

            }else{
                echo "Extensión Invalida.";
            }
        
        }
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
  <header class="header">
    <a href="#">
      <img src="logo.png" alt="Logo" class="youtube-logo" />
    </a>
    <form class="search-bar">
      <input class="search-input" type="search" placeholder="Search" aria-label="Search" />
      <button type="submit" class="search-btn">
        <img src="magnify.svg" />
      </button>
    </form>
    <div class="menu-icons">
      <button type="button" data-toggle="modal" data-target="#myModal">
        <img src="video-plus.svg" alt="Upload Video" />
      </button>
      <a href="#">
        <img src="apps.svg" alt="Apps" />
      </a>
      <a href="#">
        <img src="bell.svg" alt="Notifications" />
      </a>
      <a href="#">
        <img class="menu-channel-icon" src="http:///unsplash.it/36/36?gravity=center" alt="Your Channel" />
      </a>
    </div>
  </header>
  <div class="categories">
    <section class="category-section">
      <button class="category active">All</button>
      <button class="category">Category 1</button>
      <button class="category">Category 2</button>
      <button class="category">Category 3</button>
      <button class="category">Category 4</button>
      <button class="category">Category 5</button>
      <button class="category">Category 6</button>
      <button class="category">Category 7</button>
      <button class="category">Category 8</button>
      <button class="category">Category 9</button>
    </section>
  </div>
  <div class="videos">
    <section class="video-section">
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
    </section>
    <section class="video-section">
      <h2 class="video-section-title">
        Special Section
        <button class="video-section-title-close">&times;</button>
      </h2>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
    </section>
    <section class="video-section">
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
      <article class="video-container">
        <a href="#" class="thumbnail" data-duration="12:24">
          <img class="thumbnail-image" src="http://unsplash.it/250/150?gravity=center" />
        </a>
        <div class="video-bottom-section">
          <a href="#">
            <img class="channel-icon" src="http://unsplash.it/36/36?gravity=center" />
          </a>
          <div class="video-details">
            <a href="#" class="video-title">Video Title</a>
            <a href="#" class="video-channel-name">Channel Name</a>
            <div class="video-metadata">
              <span>12K views</span>
              •
              <span>1 week ago</span>
            </div>
          </div>
        </div>
      </article>
    </section>
  </div>

<!------------------------------------------------------ MODAL -------------------------------------------------------------->
  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Nuevo Video</h4>
      </div>
      <form method="post" action="" enctype='multipart/form-data'>
      <div class="modal-body">
          <div class="col-lg-10">
                    <div class="form-group">
                    <label for="" class="col-form-label">Nombre de Nuevo Video</label>
                    <input type="text" class="form-control" id="grupo" name="grupo">
                    </div>
                    </div>    
            <input type='file' class="btn btn-primary" name='file' />
            <input type='submit' class="btn btn-primary" value='Subir' name='but_upload'>
      </div>
      
      <div class="modal-footer">
        <button type="button"  class="btn btn-primary" data-dismiss="modal">Cerrar</button>
      </div>
      </form>
    </div>

  </div>
</div>
</body>
</html>