<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Bilder</title>
</head>
<body>

<?php
  $image = (glob("*.jpg"));
  foreach($image as $val)
  {
    echo"<img src='$val'>";
  }
  ?>
</body>
</html>
