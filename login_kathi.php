<?php session_start();

function is_eingeloggt()
{
  return isset($_SESSION["uid"]);
}

function logout()
{
  unset($_SESSION["uid"]);
}

if(isset($_GET["logout"]))
{
  logout();
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>
    <body>
      <?php
      if(isset($_POST["login"]))
      {
        $db = new mysqli("localhost", "root", "", "login");
        $result = $db->query("SELECT id FROM user WHERE user = '".mysqli_real_escape_string($db, $_POST["user"])."' AND passwort = '".md5($_POST["passwort"])."';");
        if($result->num_rows == 0)

        {
          echo'fehler';
        }
        else
        {
            echo'login erfolgreich';
            $row = $result->fetch_assoc();
            $_SESSION["uid"] = $row["id"];
        }
      }

    ?>
    <?php if(!is_eingeloggt()){?>
      <div class="container">
        <form action="" method="post">
          <div class="form-group">
              <label>Benutzer:</label>
              <input type="text" name="user" class="form-control"/>
          </div>
          <div class="form-group">
            <label>Passwort:</label>
            <input type="password" name="passwort" class="form-control"/>
          </div>
          <input type="submit" class="btn btn-primary" name="login"></button>

        </form>
      </div>
<?php }
else
{
      echo '<a href="?logout" class="btn btn-default">logout</a>';
}
?>


    </body>
    </html>
