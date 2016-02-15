<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Bilder</title>
  <style type="text/css">
    body{
      width:75em;
      margin:0 auto;
    }

    img{
      border: 0.2em solid grey;
      width:12em;
      height:12em;
      margin:0.5em;
    }
  </style>
</head>
<body>

<?php
  $image = (glob("*.jpg"));
  foreach($image as $val)
  {
    echo"<img src='$val' class='border'>";
  }
  ?>
</body>
</html>
