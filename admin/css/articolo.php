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
          <li ><a href="http://www.marcomontebello.com/index.html">Home</a></li>
          <li><a href="http://www.marcomontebello.com/about.html">About Me & CV</a></li>
          <li  class="active"><a href="blog.html">Blog</a></li>
          <li><a href="http://www.marcomontebello.com/gallery.html">Gallery</a></li>
          <li><a href="http://www.marcomontebello.com/contact.html">Contact</a></li>

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



  <?php
// controlliamo che sia stato inviato un id numerico alla pagina
if(isset($_GET['id'])&&(is_numeric($_GET['id']))){
// valorizziamo la variabile relativa all'id dell'articolo e includiamo il file di configurazione
$art_id = $_GET['id'];
@include "config.php";

// selezioniamo dalla tabella i dati relativi all'articolo
$sql = "SELECT art_autore,art_titolo,art_data,art_articolo,img_header_articolo,art_sottotitolo FROM articoli WHERE art_id='$art_id'";
$query = $connect->query($sql) or die (mysqli_error());

// se per quell'id esiste un articolo..
if(mysqli_num_rows($query) > 0){
// ...estraiamo i dati e mostriamoli a video
$row = mysqli_fetch_array($query) or die (mysql_error());
$autore = stripslashes($row['art_autore']);
$titolo = stripslashes($row['art_titolo']);

$data = $row['art_data'];
$articolo = stripslashes($row['art_articolo']);
$sottotitolo = stripslashes($row['art_sottotitolo']);
$img = $row['img_header_articolo'];

?>


  <!-- START: section -->
  <section class="probootstrap-intro probootstrap-intro-inner" style="background-image: url(<?php echo $img ?>);" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">
        <div class="col-md-7 probootstrap-intro-text">
          <h1 class="probootstrap-animate" data-animate-effect="fadeIn" style="color:white"><?php echo $titolo ?></h1>
          <div class="probootstrap-subtitle probootstrap-animate" data-animate-effect="fadeIn">
            <h2 style="color:white"><?php echo $sottotitolo ?></h2>
          </div>
        </div>
      </div>
    </div>
    <span class="probootstrap-animate"><a class="probootstrap-scroll-down js-next" href="#next-section">Scroll down <i class="icon-chevron-down"></i></a></span>
  </section>
  <!-- END: section -->






  <main>
    <div class="container">
      <div class="row">
        <div class="col-md-12 probootstrap-relative">

          <div class="item">
            <div class="row probootstrap-gutter60">
              <section id="next-section" class="probootstrap-section">
                <div class="container">
	 <?php
    //Prendo articolo direttamente da DB
    echo $articolo;
    echo "<br>";
    $data = preg_replace('/^(.{4})-(.{2})-(.{2})$/','$3-$2-$1', $data);
    echo "Scritto da <b>". $autore . "</b>";
    echo "| Articolo postato il <b>" . $data . "</b>";

    // link alla pagina dei commenti
    echo "<br><a href=\"insert_comment.php?id=$art_id\">Invia un commento</a><br><br>";

    // visualizzianmo tutti i commenti
    $sql_com = "SELECT com_autore, com_testo FROM commenti WHERE com_art='$art_id'";
    $query_com = $connect->query($sql_com) or die (mysqli_error());
    if(mysqli_num_rows($query_com) > 0){
      echo "Commenti:<br>";
      while($row_com = mysqli_fetch_array($query_com)){
        $com_autore = stripslashes($row_com['com_autore']);
        $com_testo = stripslashes($row_com['com_testo']);
        echo $com_testo . "<br>";
        echo "Inserito da <b>". $com_autore . "</b>";
        echo "<hr>";
      }
    }
  }
}else{
  // se per l'id non esiste un articolo..
  echo "Nessun articolo trovato.";
}
?>

                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>


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
              <li><a href="contact.html">Contact</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="blog.html">Blog</a></li>
              <li><a href="admin/login.php">Admin? Enter!</a></li>            </ul>
            <ul class="probootstrap-footer-link float">

            </ul>
          </div>
        </div>
        <div class="col-md-5 col-md-push-1">
          <div class="probootstrap-footer-widget">
            <h4>Contact Info</h4>
            <ul class="probootstrap-contact-info">
              <li><i class="icon-location2"></i> <span>Torino</span></li>
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
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122360216-1"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-122360216-1');
  </script>

  </body>
</html>
