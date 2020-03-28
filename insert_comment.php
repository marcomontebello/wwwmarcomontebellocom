<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Marco Montebello - Personal WebSite</title>
  <meta name="description" content="Sito personale Marco Montebello">
  <meta name="keywords" content="marco, marco montebello, foto, viaggi, blog">

  <link href="https://fonts.googleapis.com/css?family=Inconsolata|Rubik:300,400,700,900" rel="stylesheet">
  <link rel="stylesheet" href="css/styles-merged.css">
  <link rel="stylesheet" href="css/style.min.css">
  <link rel="stylesheet" href="css/custom.css">

  <!--[if lt IE 9]>
  <script src="js/vendor/html5shiv.min.js"></script>
  <script src="js/vendor/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <!-- START: header -->


  <header role="banner" class="probootstrap-header">
    <div class="container-fluid">
      <a href="index.html" class="probootstrap-logo">Computer Engineer<span></span></a>

      <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
      <div class="mobile-menu-overlay"></div>

      <nav role="navigation" class="probootstrap-nav hidden-xs">
        <ul class="probootstrap-main-nav">
          <li ><a href="index.html">Home</a></li>
          <li><a href="about.html">About Me & CV</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="gallery.html">Gallery</a></li>
          <li  class="active"><a href="contact.html">Contact</a></li>
          <li><a>Work in Progress...</a></li>

        </ul>
        <ul class="probootstrap-header-social hidden-xs">
          <li><a href="https://www.facebook.com/marcomontebello"><i class="icon-facebook2"></i></a></li>
          <li><a href="https://www.instagram.com/marcomontebello"><i class="icon-instagram2"></i></a></li>
        </ul>
        <div class="extra-text visible-xs">
          <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
          <h5>Connect With Me</h5>
          <ul class="social-buttons">
            <li><a href="https://www.facebook.com/marcomontebello"><i class="icon-facebook2"></i></a></li>
            <li><a href="https://www.instagram.com/marcomontebello"><i class="icon-instagram2"></i></a></li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <!-- END: header -->
  
  <!-- START: section -->
  <section class="probootstrap-intro probootstrap-intro-inner" style="background-image: url(img/hero_bg_1_b.jpg);" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">
        <div class="col-md-7 probootstrap-intro-text">
          <h1 class="probootstrap-animate" data-animate-effect="fadeIn" style="color:white">BLOG</h1>
          <div class="probootstrap-subtitle probootstrap-animate" data-animate-effect="fadeIn">
            <h2 style="color:white">Inserisci un commento</h2>
          </div>
        </div>
      </div>
    </div>
    <span class="probootstrap-animate"><a class="probootstrap-scroll-down js-next" href="#next-section">Scroll down <i class="icon-chevron-down"></i></a></span>
  </section>
  <!-- END: section -->
  <main>
      <?php
// includiamo il file di configurazione
@include "config.php";

// se sono stati inviati dei parametri valorizziamo con essi le variabili
// per l'inserimento nella tabella
if(isset($_POST['submit'])){
  if(isset($_POST['autore'])){
    $autore = addslashes($_POST['autore']);
  }
  if(isset($_POST['testo'])){
    $testo = addslashes($_POST['testo']);
  }
  if(isset($_POST['id'])){
    $com_art = addslashes($_POST['id']);
  }

  // popoliamo i campi della tabella commenti con i dati ricevuti dal form
  $sql = "INSERT INTO commenti (com_autore, com_testo, com_art) VALUES ('$autore', '$testo', '$com_art')";
  
  // se l'inserimento ha avuto successo inviamo una notifica
  if ($connect->query($sql) or die (mysql_error())){
    echo "Commento inserito con successo.";
  } 
}else{
  //controlliamo che l'id dell'articolo sia realamente esistente
  if(isset($_GET['id'])&&(is_numeric($_GET['id']))){
    $com_art = addslashes($_GET['id']);
    $sql = "SELECT art_id FROM articoli WHERE art_id='$com_art'";
    $query = $connect->query($sql) or die (mysql_error());
    if(mysqli_num_rows($query) > 0){
      // se non sono stati inviati dati dal form mostriamo il modulo per l'inserimento
      ?>
      
      
      
    <section id="next-section" class="probootstrap-section">
      <div class="container">
        <div class="col-md-6">
            <form action="insert_comment.php" method="post" class="probootstrap-form">
              <div class="row">
                  <div class="form-group">
                    <label for="fname">Autore</label>
                    <input type="text" size=20 class="form-control" id="fname" name="autore">
                  </div>

              <div class="form-group">
                <label for="message">Messaggio</label>
                <textarea cols="30" rows="10" class="form-control" id="message" name="testo"></textarea>                              <input name="id" type="hidden" value="<?php echo $com_art; ?>">

              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Invia Messaggio">
              </div>

            </form>
            
            <?php
      // se l'id dell'articolo non esiste o non è numerico inviamo delle notifiche
    }else{
      echo "Impossibile inserire un commento.";
    }
  }else{
    echo "Impossibile inserire un commento.";
  }
}
?>
          </div>
        
      </div>
    </section>
    
  </main>
  <footer class="probootstrap-footer">
    <div class="probootstrap-backtotop"><a href="#" class="js-backtotop"><i class="icon-chevron-thin-up"></i></a></div>
    <div class="container">
      <div class="row mb50">
        <div class="col-md-3">
          <div class="probootstrap-footer-widget">
            <h4>About The Site</h4>
            <p>Questo sito nasce dalla volontà di raggruppare tutto ciò che riguarda la mia identità digitale e per condividere la mia grande passione per la scoperta del mondo.</p>
          </div>
        </div>
        <div class="col-md-3 col-md-push-1">
          <div class="probootstrap-footer-widget">
            <h4>Links</h4>
            <ul class="probootstrap-footer-link float">
              <li><a href="index.html">Home</a></li>
              <li class="active"><a href="contact.html">Contact</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="gallery.html">Gallery</a></li>
            </ul>
            <ul class="probootstrap-footer-link float">

            </ul>
          </div>
        </div>
        <div class="col-md-5 col-md-push-1">
          <div class="probootstrap-footer-widget">
            <h4>Contact Info</h4>
            <ul class="probootstrap-contact-info">
              <li><i class="icon-location2"></i> <span>Via Cardinal Massaia 71, Torino</span></li>
              <li><i class="icon-mail"></i><span>info@marcomontebello.com</span></li>
              <li><i class="icon-phone2"></i><span>+39 011 19715059</span></li>
            </ul>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-12 text-center border-top">
          <p class="mb0">&copy; Copyright 2018. All Rights Reserved. <br> Designed by Marco Montebello</p>
        </div>
      </div>
    </div>
  </footer>


  <script src="js/scripts.min.js"></script>
  <script src="js/main.min.js"></script>
  <script src="js/custom.js"></script>
  </body>
</html>