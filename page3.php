<?php
session_start();
$name=$_SESSION["name"];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verification Success</title>

  </head>
  <body>

<?php

echo '<script>alert("User-Verification Success!")</script>';

?>
  </body>
</html>
