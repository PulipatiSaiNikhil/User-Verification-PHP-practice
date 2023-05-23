<?php
session_start();
$name=$_SESSION["name"];

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verification Success</title>
    <style media="screen">
      *{
        background-color: #caedec;
      }
      .heading{
        text-align: center;
        padding-top:250px;
      }
    </style>
  </head>
  <body>
    <?php echo '<script>alert("User-Verification Success!")</script>'; ?>
    <div class="heading">
      <h1>Thankyou for filling this form <?php echo $name; ?></h1>

    </div>

  </body>
</html>
