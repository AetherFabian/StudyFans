<?php
  require 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>2</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/html5-video.css">
    <link rel="stylesheet" href="assets/css/Like-Button-for-PanelBear-Analytics.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
<?php if(!empty($id)): ?>
      
      <?php  include('partials/header.php') ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8"><video controls>
  <source src="assets/videos/fileName.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video><button class="btn btn-primary" type="button">SUSCRIBE</button><!--Requires PanelBear analytics account and header script-->

<button id="likebutton" onclick="liked()" class="btn btn-outline-dark btn-sm" type="button">like<svg
        xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1em" viewBox="0 0 20 20" fill="none">
        <path
            d="M2 10.5C2 9.67157 2.67157 9 3.5 9C4.32843 9 5 9.67157 5 10.5V16.5C5 17.3284 4.32843 18 3.5 18C2.67157 18 2 17.3284 2 16.5V10.5Z"
            fill="currentColor"></path>
        <path
            d="M6 10.3333V15.7639C6 16.5215 6.428 17.214 7.10557 17.5528L7.15542 17.5777C7.71084 17.8554 8.32329 18 8.94427 18H14.3604C15.3138 18 16.1346 17.3271 16.3216 16.3922L17.5216 10.3922C17.7691 9.15465 16.8225 8 15.5604 8H12V4C12 2.89543 11.1046 2 10 2C9.44772 2 9 2.44772 9 3V3.66667C9 4.53215 8.71929 5.37428 8.2 6.06667L6.8 7.93333C6.28071 8.62572 6 9.46785 6 10.3333Z"
            fill="currentColor"></path>
    </svg></button>




<script>



    let likepost = document.getElementById("likebutton");

    likepost.addEventListener("click", function () {
        panelbear("track", "likepost");
    });
</script>
<dl class="row">
  <dt class="col-sm-3">Description lists</dt>
  <dd class="col-sm-9">A description list is perfect for defining terms.</dd>
</dl></div>
            <div class="col-md-4"><div class="container">
    <div class="row">
        <div class="col-md-12">

<div id="comments" class="comments-area">

			<h2 class="comments-title">Comments</h2>

		
		<ol class="comment-list">
					<li id="comment-1" class="comment even thread-even depth-1">
			<article id="div-comment-1" class="comment-body">
				<footer class="comment-meta">
					<div class="comment-author vcard">
						<img alt="" src="http://0.gravatar.com/avatar/?s=42&amp;d=mm&amp;r=g" srcset="http://1.gravatar.com/avatar/?s=84&amp;d=mm&amp;r=g 2x" class="avatar avatar-42 photo avatar-default" height="42" width="42">						<b class="fn"><a href="https://wordpress.org/" rel="external nofollow" class="url">Sr. WordPress</a></b> <span class="says">Says:</span>					</div><!-- .comment-author -->

					<div class="comment-metadata">
						<a href="http://localhost/wordpress/2016/10/05/ola-mundo/#comment-1">
							<time datetime="2016-10-05T19:14:53+00:00">
								5 de octubre de 2021 às 19:14							</time>
						</a>
											</div><!-- .comment-metadata -->

									</footer><!-- .comment-meta -->

				<div class="comment-content">
					<p>Olá, Isto é um comentário.<br>
Para excluir um comentário, faça o login e veja os comentários de posts. Lá você terá a opção de editá-los ou excluí-los.</p>
				</div><!-- .comment-content -->

		</article><!-- .comment-body -->
</li><!-- #comment-## -->
		</ol><!-- .comment-list -->

		
	
	
					<div id="respond" class="comment-respond">
			<h2 id="reply-title" class="comment-reply-title">Leave a comment <small><a rel="nofollow" id="cancel-comment-reply-link" href="/wordpress/2016/10/05/ola-mundo/#respond" style="display:none;">Cancel comment</a></small></h2>				<form action="http://localhost/wordpress/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate="">
					<p class="comment-form-comment"><label for="comment">Comment</label> <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required="required"></textarea></p><p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input id="author" name="author" type="text" value="" size="30" aria-required="true" required="required"></p>
<p class="comment-form-url"><label for="url">Site</label> <input id="url" name="url" type="url" value="" size="30"></p>
<p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Publicar comentário"> <input type="hidden" name="comment_post_ID" value="1" id="comment_post_ID">
<input type="hidden" name="comment_parent" id="comment_parent" value="0">
</p>				</form>
					</div><!-- #respond -->
		
</div>
            
        </div>  
        </div>
    </div>
</div>
        </div>
    </div>
    <?php else: ?>
      <div class="logo">
        <form>
          <h2>¿Who are we?</h2>
          <p class="red">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Sed expedita quis enim reprehenderit maiores sunt delectus cumque, 
            perspiciatis natus quo consectetur cupiditate! 
            Voluptates ut sunt cum sit deserunt doloremque ad.</p>
          
          <a href="signup.php">
            <button type="button" value="Registrate" class="logButton" >Registrate</button>
          </a>
          <a href="login.php">
            <button type="button" value="Iniciar Sesion" class="logButton" >Login</button>
          </a>
        </form>
    
        <h3 class="logo">StudyFans</h3>
      
      </div>
    
      <form action="">
        <div class="redes-sociales">
          <h2>Our Social Networks </h2>
          <a href="https://twitter.com/GustavoVallado4" class="boton-redes twitter fab fa-twitter" target="_blank"><i class="icon-twitter"></i></a>
          <p class="red">@GustavoVallado4</p>
        </div>
        <div class="redes-sociales">
          <a href="https://twitter.com/Aether_Fabian" class="boton-redes twitter fab fa-twitter" target="_blank"><i class="icon-twitter"></i></a>
          <p class="red">@Aether_Fabian</p>
        </div>
        <div class="redes-sociales">
          <a href="https://twitter.com/Vornic_" class="boton-redes twitter fab fa-twitter" target="_blank"><i class="icon-twitter"></i></a>
          <p class="red">@Vornic_</p>
        </div>
        <div class="redes-sociales">
          <a href="https://twitter.com/TurcoAv" class="boton-redes twitter fab fa-twitter" target="_blank"><i class="icon-twitter"></i></a>
          <p class="red">@TurvoAv</p>
        </div>
      </form>
    </form>
    <?php endif; ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>