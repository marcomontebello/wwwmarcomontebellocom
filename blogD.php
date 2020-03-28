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
          <h1 class="probootstrap-animate" data-animate-effect="fadeIn" style="color:white">Blog</h1>
          <div class="probootstrap-subtitle probootstrap-animate" data-animate-effect="fadeIn">
            <h2 style="color:white">Diari di viaggio</h2>
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

					// includiamo il file di configurazione
					@include "config.php";

					// includiamo la pagina contenente il codice per la creazione delle anteprime
					@require "anteprima.php";

					// estraiamo i dati relativi agli articoli dalla tabella
					$sql = "SELECT * FROM articoli ORDER BY art_data DESC";
					$query = $connect->query($sql) or die (myssql_error());

					//verifichiamo che siano presenti records
					  // se la tabella contiene records mostriamo tutti gli articoli attraverso un ciclo
					  while($row = mysqli_fetch_array($query)){
						$art_id = $row['art_id'];
						$autore = stripslashes($row['art_autore']);
						$titolo = stripslashes($row['art_titolo']);
						$titolo_h2 = stripslashes($row['art_titolo_h2']);
						$titolo_h3 = stripslashes($row['art_titolo_h3']);

						$img = $row['img_anteprima'];
						$data = $row['art_data'];
						$articolo = stripslashes($row['art_articolo']);
					   

						echo "<div class=\"col-md-4 col-sm-6\">
                      <figure>
                        <a href=\"articolo.php?id=$art_id\"><img src=".$img." class=\"img-responsive img-rounded\" /></a>
                      </figure>
                      <h3>".$titolo."</h3>
                      <p>".$titolo_h2."</p>
                      <p>".$titolo_h3."</p>";
					   
						// creaimo l'anteprima che mostra le prime 30 parole di ogni singolo articolo
						// per farlo utilizzo una funzione che vi presenterò più avanti
						//echo @anteprima($articolo, 30, $link); 
						//echo "<br><br>";
					   
						// formattiamo la data nel formato europeo
						$data = preg_replace('/^(.{4})-(.{2})-(.{2})$/','$3-$2-$1', $data);

						// stampiamo una serie di informazioni
						echo  "Scritto da <b>". $autore . "</b>";
						echo  "| Articolo postato il <b>" . $data . "</b>";
						echo  "| Commenti: "; 
					  
						// mostriamo il numero di commenti relativi ad ogni articolo
						$conta = "SELECT COUNT(com_id) as conta from commenti WHERE com_art = '$art_id'";
						$conto = $connect->query($conta);
						$tot = @mysqli_fetch_array ($conto);
						echo $sum2 = $tot['conta'];
						echo "</div><div class=\"clearfix visible-sm-block\"></div>";
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
              <li class="active"><a href="gallery.html">Gallery</a></li>
            </ul>
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