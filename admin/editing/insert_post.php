<?php
    session_start();
    include('config.php');
    
     if(!isset($_SESSION['login_user'])){
       
      header("location:https://wwwmarcomontebellocom.000webhostapp.com/admin/login.php");
   }
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($connect,"select username from admin where username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
  
?>
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
 <!-- <link rel="stylesheet" href="css/custom.css">-->

  <!--[if lt IE 9]>
  <script src="js/vendor/html5shiv.min.js"></script>
  <script src="js/vendor/respond.min.js"></script>
  <![endif]-->
</head>

  <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
 <script>
  tinymce.init({
    content_css : "css/style.css,css/styles-merged.css,css/style.min.css,css/styles-merged.css.map,css/vendor/magnific-popup.css,css/vendor/owl.carousel.min.css,css/vendor/owl.theme.default.min.css,css/vendor/photoswipe.css",
    selector: '#articolo',
    toolbar: "image",
     plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools wordcount"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
 imagetools_cors_hosts: ['mydomain.com', 'otherdomain.com'],
  style_formats: [
    { title: 'Headers', items: [
      { title: 'h1', block: 'h1' },
      { title: 'h2', block: 'h2' },
      { title: 'h3', block: 'h3' },
      { title: 'h4', block: 'h4' },
      { title: 'h5', block: 'h5' },
      { title: 'h6', block: 'h6' }
    ] },

    { title: 'Blocks', items: [
      { title: 'p', block: 'p' },
      { title: 'div', block: 'div' },
      { title: 'pre', block: 'pre' }
    ] },

    { title: 'Containers', items: [
      { title: 'section', block: 'section', wrapper: true, merge_siblings: false },
      { title: 'article', block: 'article', wrapper: true, merge_siblings: false },
      { title: 'blockquote', block: 'blockquote', wrapper: true },
      { title: 'hgroup', block: 'hgroup', wrapper: true },
      { title: 'aside', block: 'aside', wrapper: true },
      { title: 'figure', block: 'figure', wrapper: true }
    ] }
  ],
  setup: function(editor) {
    editor.addMenuItem('Intro', {
      text: 'Inserisci Intro Articolo',
      context: 'tools',
      onclick: function() {
        editor.insertContent('<div class="row"><div class="col-md-12 probootstrap-relative"><h2>Titolo</h2><h4 class="probootstrap-heading mt0 mb50">Data</h4><p class="col-md-12 probootstrap-relative" style="text-align: justify">Intro Text</p></div></div><div class="row"><div class="col-md-12 probootstrap-relative">');
      }
    }); 
    
    editor.addMenuItem('Scheletro Racconto', {
      text: 'Inserisci Scheletro Articolo',
      context: 'tools',
      onclick: function() {
        editor.insertContent('<div class="row"><div class="col-md-12 probootstrap-relative">Inserire plugin Mappa<div class="item"><div class="row probootstrap-gutter60">Inserire Sezioni racconto</div></div></div></div>');
      }
    });
    
    
     editor.addMenuItem('Sezione Racconto', {
      text: 'Inserisci Sezione Articolo',
      context: 'tools',
      onclick: function() {
        editor.insertContent('<section id="next-section" class="probootstrap-section"><h4># Day X</h4><p class="col-md-12 probootstrap-relative" style="text-align: justify">Text </p>Insert here Image Container from Tools<div class="clearfix visible-sm-block"></div></section>');
      }
    
    });
    
    
    editor.addMenuItem('Container 6 Immagini', {
      text: 'Inserisci Template Immagini',
      context: 'tools',
      onclick: function() {
        editor.insertContent('<div class="container"><figure class="row"><div class="col-md-4 col-sm-6"><figure><a href=\'https://lh3.googleusercontent.com/00tFZo2ZLc50MTfYPy_0m-2TYAUZkalFmZ5jG5RoHKqzaLHR7ZzwKpwRequVVbBqsKyDWolZmVaCpN61uWRBe4O2_yyqd01M8DcxOXr7x4yAATW0Q6WZY3pffRRxOlneJGqZopwQc_g=w2400\' class="image-popup"><img src=\'https://lh3.googleusercontent.com/00tFZo2ZLc50MTfYPy_0m-2TYAUZkalFmZ5jG5RoHKqzaLHR7ZzwKpwRequVVbBqsKyDWolZmVaCpN61uWRBe4O2_yyqd01M8DcxOXr7x4yAATW0Q6WZY3pffRRxOlneJGqZopwQc_g=w2400\' class="img-responsive img-rounded" />Traghetto</a></figure></div><div class="clearfix visible-sm-block"></div><div class="col-md-4 col-sm-6"><figure><a href=\'https://lh3.googleusercontent.com/_5DxyJRW9P3zBNk-iK2WHy4SZ9mlkqeqKgY4AiPWPKyP5RfaJ-47781BGPiNgWZjmlj8NGhrgUP01fqD33_nBM4d_JBMqnr3gKOaR9BwFU2vGKqGTe3N9fusqBgOYt-KqHijD422ubI=w2400\' class="image-popup"><img src=\'https://lh3.googleusercontent.com/_5DxyJRW9P3zBNk-iK2WHy4SZ9mlkqeqKgY4AiPWPKyP5RfaJ-47781BGPiNgWZjmlj8NGhrgUP01fqD33_nBM4d_JBMqnr3gKOaR9BwFU2vGKqGTe3N9fusqBgOYt-KqHijD422ubI=w2400\' class="img-responsive img-rounded"/>Lofoten in avvicinamento</a></figure></div><div class="clearfix visible-sm-block"></div><div class="col-md-4 col-sm-6"><figure><a href=\'https://lh3.googleusercontent.com/KPcX1DUo2ztOOiZrs3TwZL7sW1Jz4upVmMsCnOuIpO4AG_V5lwccmLLN3SqWqvRWl2IhFp576_dwhWS4cM1vpjw5MmMiJpoba3bZQxXJXBTGg3YKfN-a6OLlBU3uqAr3TVNOIwA6VDg=w2400\' class="image-popup"><img src=\'https://lh3.googleusercontent.com/KPcX1DUo2ztOOiZrs3TwZL7sW1Jz4upVmMsCnOuIpO4AG_V5lwccmLLN3SqWqvRWl2IhFp576_dwhWS4cM1vpjw5MmMiJpoba3bZQxXJXBTGg3YKfN-a6OLlBU3uqAr3TVNOIwA6VDg=w2400\' class="img-responsive img-rounded"/>Salottino di anziana norvegese contrariata</a></figure></div><div class="clearfix visible-sm-block"></div></figure><figure class="row"><div class="col-md-4 col-sm-6"><figure><a href=\'https://lh3.googleusercontent.com/cN6eGCTgHEJuKlMuOiOiVqoNeby4Am4I9s1Zp-Tm3Kv_0t6xVl7nPcKDa4vf6njRoJkE3FATrgFHNbhHGzGFbXlLLeQ4dJgTkXJMqAAmfNAEtq76fF25lzRaeGJICL5cllk7nZOU26c=w2400\' class="image-popup"><img src=\'https://lh3.googleusercontent.com/cN6eGCTgHEJuKlMuOiOiVqoNeby4Am4I9s1Zp-Tm3Kv_0t6xVl7nPcKDa4vf6njRoJkE3FATrgFHNbhHGzGFbXlLLeQ4dJgTkXJMqAAmfNAEtq76fF25lzRaeGJICL5cllk7nZOU26c=w2400\' class="img-responsive img-rounded" />Traversta Bodø - Moskenes</a></figure></div><div class="clearfix visible-sm-block"></div><div class="col-md-4 col-sm-6"><figure><a href=\'https://lh3.googleusercontent.com/hVQuxIOBZAKeSNB8ItqfUsa7U8StmIGmcCJbVuMxqf_ekdhrm2GMLs2ZLY860mdjJyiUo07PQju1Xb-WlIcNYiFulSPXWc0uQXTvBfIcRgKthv3pIlqANT565P7wvqzcXhBQCbSHU-c=w2400\' class="image-popup"><img src=\'https://lh3.googleusercontent.com/hVQuxIOBZAKeSNB8ItqfUsa7U8StmIGmcCJbVuMxqf_ekdhrm2GMLs2ZLY860mdjJyiUo07PQju1Xb-WlIcNYiFulSPXWc0uQXTvBfIcRgKthv3pIlqANT565P7wvqzcXhBQCbSHU-c=w2400\' class="img-responsive img-rounded"/>Scampagnata Notturna a Moskenes</a></figure></div><div class="clearfix visible-sm-block"></div> <div class="col-md-4 col-sm-6"><figure><a href=\'https://lh3.googleusercontent.com/bzO2perdotVqLgEAcVjSRmjqw4xB4MQf6g12gLeobGJWA_yG6UUqWAGRkXOHWaYNrRDOLshgADApcQoybHsUYrLybn1OupEKb78vnd9nOoHHNy70sk5CyJkJwyRl51FiY3nuiLfyJxg=w2400\' class="image-popup"><img src=\'https://lh3.googleusercontent.com/bzO2perdotVqLgEAcVjSRmjqw4xB4MQf6g12gLeobGJWA_yG6UUqWAGRkXOHWaYNrRDOLshgADApcQoybHsUYrLybn1OupEKb78vnd9nOoHHNy70sk5CyJkJwyRl51FiY3nuiLfyJxg=w2400\' class="img-responsive img-rounded"/>Å</a></figure></div><div class="clearfix visible-sm-block"></div></figure></div>');
      }
    
    });
    
    
    
    

  },
  });
  </script>
  
  
<body>
  <!-- START: header -->


  <header role="banner" class="probootstrap-header">
    <div class="container-fluid">
      <a  class="probootstrap-logo"><span>Welcome back boss!</span></a>
      <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>
      <nav role="navigation" class="probootstrap-nav hidden-xs">
        <ul class="probootstrap-main-nav">
          <li ><a href="http://www.marcomontebello.com">Vai al sito</a></li>
          <li><a href="https://wwwmarcomontebellocom.000webhostapp.com/admin/logout.php">Logout</a></li>
        </ul>
        <div class="extra-text visible-xs">
          <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
         </div>
      </nav>
    </div>
  </header>
  <!-- END: header -->

  <!-- START: section -->
  <section class="probootstrap-intro probootstrap-intro-inner" style="background:linear-gradient(blue, azure);" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row">
        <div class="col-md-7 probootstrap-intro-text">
          <h1 class="probootstrap-animate" data-animate-effect="fadeIn" style="color:white">EDITOR BLOG</h1>
          <div class="probootstrap-subtitle probootstrap-animate" data-animate-effect="fadeIn">
            <h2 style="color:white">Scrivi un nuovo articolo</h2>
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
//includiamo il file di configurazione
@include "config.php";

//valorizziamo le variabili con i dati ricevuti dal form
if(isset($_POST['submit'])){
  if(isset($_POST['autore'])){
    $autore = addslashes($_POST['autore']);
  }
  if(isset($_POST['titolo'])){
    $titolo = addslashes($_POST['titolo']);
  }
  if(isset($_POST['articolo'])){
    $articolo = addslashes($_POST['articolo']);
  }

  // popoliamo i campi della tabella articoli con i dati ricevuti dal form
  $sql = "INSERT INTO articoli (art_autore, art_titolo, art_articolo, art_data) VALUES ('$autore', '$titolo', '$articolo', now())";

  // se l'inserimento ha avuto successo inviamo una notifica
 if ($connect->query($sql) === TRUE) {
    echo '<script type="text/javascript">
           window.location = "https://wwwmarcomontebellocom.000webhostapp.com/blog_bck.php"
      </script>'; } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
 }
}else{
  // se non sono stati inviati dati dal form mostriamo il modulo per l'inserimento
  ?>
      
    <section id="next-section" class="probootstrap-section">
      <div class="container">
            <form action="insert_post.php" method="post" class="probootstrap-form">
              <div class="row">
                  <div class="form-group">
                    <label for="fname">Autore:</label>
                    <input type="text" size="20" class="form-control" id="autore" name="autore">
                  </div><br>
					<div class="form-group">
                    <label for="fname">Titolo:</label>
                    <input type="text" size="20" class="form-control" id="titolo" name="titolo">
                  </div>
				  <div class="form-group">
					<label for="message">Testo:</label>
					<textarea cols="40" rows="10" class="form-control" id="articolo" name="articolo"></textarea>    
					
				  </div>
				  <div class="form-group">
					<input type="submit" class="btn btn-primary" id="submit" name="submit" value="Salva Articolo">
				  </div>
			  </div>

            </form>
            
            <?php
    }
?>

      </div>
    </section>
    
  </main>
 


  <script src="js/scripts.min.js"></script>
  <script src="js/main.min.js"></script>
  <script src="js/custom.js"></script>
  </body>
</html>