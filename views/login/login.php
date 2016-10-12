<?php if ( ! defined('ABSPATH') ) exit; ?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Material Design Lite</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <style>

      body {
        background-color: rgb( 55,71,79 );
        background-color: rgb( 38,50,56 );
      }
      .btn {
        margin-bottom: 10px;
      }
      .login {
        width: 500px;
        margin: 5% auto;
        color:  rgb( 38,50,56 ) !important;
        background-color: rgb( 245,245,245 );
        border-radius: 5px;
        padding-top: 25px;
        padding-right: 20px;
      }
      @media only screen and (max-width: 700px) {
        /* For mobile phones: */
        .login {
          width: 90%;
        }
      }

    </style>
    <?php 

      // Chama método que irá receber e tratar os dados do formulário
      $model->user_login();

     ?>
  </head>
  <body>
    <div class="mdl-dialog login">
      <div class="mdl-dialog__content">
        
        <div class="row">

        <form class="form-horizontal" method="post">
          <div class="form-group">
            <label class="control-label col-sm-2" for="login">login</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="login" name="user" placeholder="Insira o login">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Senha</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="pwd" name="user_password" placeholder="Insira a senha">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success">Entrar</button>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <?php 

              // Exibe a mensagem de erro
              echo $model->form_msg;

             ?>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
  </body>
</html>