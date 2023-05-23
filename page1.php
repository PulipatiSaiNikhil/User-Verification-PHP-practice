<?php
 session_start();
 $checkname = false;
 $checknumber = false;
 $checkemail = false;
 //if (isset($_POST["name"]) && isset($_POST["number"]) && isset($_POST["email"])) {
 if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["name"];
    $number=$_POST["number"];
    $email=$_POST["mail"];
    $w="@gmail.com";
    $_SESSION["name"]=$name;
    //var_dump(str_contains($email,$w));
    //echo $name." ".$number." ".$email;
    if(strlen($name)==0 || empty($name)){
      $checkname="Please re-enter your Name.";
    }
    else if(!(strlen($number)==10 || ($number[0]=="+" && $number[1]=="9" && $number[2]=="1" && strlen($number)==13))){
      $checknumber="Please re-enter your Phone No.";
    }
    else if(str_contains($email, $w)===false){
      $checkemail="Please re-enter your Email.";
    }
    else{
      header("location:page2.php?name='.$name.'");
    }
  }


?>



<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Verification-1</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        </style>
    </head>

    <body>
      <?php
          if($checkname)
          {
              echo
              '<div for="signup" class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error!</strong> '.$checkname.'
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          }
          else if($checknumber)
          {
              echo
              '<div for="signup" class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error!</strong> '.$checknumber.'
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          }
          else if($checkemail)
          {
              echo
              '<div for="signup" class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error!</strong> '.$checkemail.'
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          }
      ?>

        <div class="container h-100">
            <div class="mt-5 row d-flex justify-content-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;background-color:#bce9ee;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Form Verification</h2>

                            <form action=page1.php method="post">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Name:</label>
                                    <div class="col-sm-9">
                                        <input style="border:0.5px solid;" required data-toggle="tooltip"
                                            title="Please ensure you fill this field" type="text"
                                            class="form-control" id="name" name="name" placeholder="Enter your Name"
                                            value="<?php echo isset($_POST["name"]) ? htmlspecialchars($_POST["name"], ENT_QUOTES) : ''; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="number" class="col-sm-3 col-form-label">Phone No:</label>
                                    <div class="col-sm-9">
                                        <input style="border:0.5px solid;" data-toggle="tooltip"
                                            title="Please ensure you fill this field" required type="number"
                                            class="form-control" id="number" name="number" placeholder="Enter your Phone Number"
                                            value="<?php echo isset($_POST["number"]) ? htmlspecialchars($_POST["number"], ENT_QUOTES) : ''; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mail" class="col-sm-3 col-form-label">Email:</label>
                                    <div class="col-sm-9">
                                        <input style="border:0.5px solid;" data-toggle="tooltip"
                                            title="Please ensure you fill this field" required type="text"
                                            class="form-control" id="mail" name="mail" placeholder="Enter your Email"
                                            value="<?php echo isset($_POST["mail"]) ? htmlspecialchars($_POST["mail"], ENT_QUOTES) : ''; ?>">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
            integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
        </script>
    </body>

</html>
