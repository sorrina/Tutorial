<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Gästebuch</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
  <?php
  $db = @new mysqli('localhost', 'root', '', 'gb');
  if (mysqli_connect_errno()) {
      die ('Konnte keine Verbindung zur Datenbank aufbauen: '.mysqli_connect_error().'('.mysqli_connect_errno().')');
  }
 if(isset($_POST["button"])) 
 {
	 $name = mysqli_real_escape_string($db, $_POST['name']);
	 $mail = mysqli_real_escape_string($db, $_POST['mail']);
	$text = mysqli_real_escape_string($db, $_POST['text']);
	 
	 
	 $sql = "INSERT INTO `gaestebuch` (`name`, `email`, `text`, `datum`) VALUES ('$name', '$mail', '$text', now())";
if(!$db->query($sql)) 
{
	echo'fehler';
}
	
 }
 if(isset($_GET["delete"]))
 {
	   $sql = "DELETE FROM `gaestebuch` WHERE `gaestebuch`.`ID` = ".$_GET["delete"];
  $result = $db->query($sql);
 }
	   $sql = "SELECT * FROM `gaestebuch` order by datum asc";
  $result = $db->query($sql);
  echo 'Die Ergebnistabelle besitzt '.$result->num_rows." Datensätze<br />\n";
while ($row = $result->fetch_assoc()) {  // NULL ist äquivalent zu false
    // $row ist nun das Array mit den Werten
echo'<div>' .strip_tags($row['name']).' hat am '.date_format(date_create($row['datum']),'d.m.Y - H.i.s'). ' diese Nachricht geschrieben '.strip_tags($row['text']).'</div>';
   echo'<a href="?delete='.$row["ID"].'">löschen</a>'; 
	//echo ' "'.$row['Titel'].'" wurde am "'.$row['Datum']."\" geschrieben<br />\n";
	
	
}

  ?>

  <div class="container">


    <div class="col-md-1">
      text
    </div>

  <form method="post" action="" class="form-horizontal">
  	<div class="form-group">
  		<label>Name:</label>
  		<input type="text" name="name" class="form-control">
  	</div>
  	<div class="form-group">
  		<label>Email:</label>
  		<input type="email" name="mail" class="form-control">
  	</div>
  	<div class="form-group">
  		<label>Nachricht:</label>
  		<textarea name="text" class="form-control" rows="4">
  	</textarea></div>

  	<input type="submit" value="senden" name="button" class="btn btn-primary btn-lg">
  </form>
  </div>
  
  
  
  
</body>
</html>
