<?php // Do not put any HTML above this line

if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: index.php");
    return;
}

  $salt = 'XyZzy12*_';
  $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
      // sample Pw is php123 and we add salt to strengthen it
      // stored hash is the concatenated of $salt.$stored_hash
  $failure = false; // this occurs if we have no POST data sent

  //check to see if we have some POST data, if we do, process it
  if ( isset($_POST['who']) && isset($_POST['pass']) ) {
      if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
          $failure = "User name and password are required";
      } else {
          $check = hash('md5', $salt.$_POST['pass']);
          if ( $check == $stored_hash ) {
              // Redirect the browser to game.php
              header("Location: game.php?name=".urlencode($_POST['who']));
              return;
          } else {
              $failure = "Incorrect password";
      }
    }
  }
// done with model (the code above), we fall through into view
?>

<!DOCTYPE html>
<html>
  <head>
    <?php require_once "bootstrap.php"; ?>
    <title> Gabriel N Onike Log In Page</title>
  </head>
<body>
<div class="container" >
<h1> LOG IN HERE </h1>

<?php
//default password on page is set to null(nothing) = false by
//... by invoking failure
if ( $failure !== false ) {
  echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
  //notice use of single nd double quotes
}
?>
<form method="POST">
<label for="nam">User Name</label>
<input type="text" name="who" id="nam"><br/>
<label for="id_1723">Password</label>
<input type="text" name="pass" id="id_1723"><br/>
<input type="submit" value="Log In">
<input type="submit" name="cancel" value="Cancel">
</form>
<p>
Find password hint in page source
<!-- HINT : password is 3 character name of the programming langauge on
on this page followed by 123 -->
</p>
</div>
</body>
