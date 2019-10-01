<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Upload an image | Interclip</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/style.css" rel="stylesheet" media="screen">
    <link href="./css/mobile-style.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/image.css">
    <link rel="shortcut icon" href="./favicon.png">

</head>

</head>


<!-- Trigger/Open The Modal -->

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
  <center>

    <span class="close">&times;</span>
    <img class="modalImg" src="" width="100%" class="center">
    <p id="code">The code to your image</p>
</center>
  </div>

</div>

<?php
include("menu.php");
?>
<body>
    <div class="title">
        <h1>Upload an image to Interclip using the <a href="https://apidocs.imgur.com/?version=latest">Imgur API </a></h1>
        <p>Just drag&drop</p>

    </div>
    <div class="dropzone">
        <div class="info"></div>
    </div>

    <script type="text/javascript" src="./js/imgur.min.js"></script>
    <script type="text/javascript" src="./js/upload.js"></script>
    <script src="js/modal.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>

</html>