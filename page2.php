<?php
session_start();
 if(!isset($_SESSION["name"])){
   header("location:page1.php");
   exit();
 }
 $checkaddress = false;
 $checkage = false;
 $checkuniversity = false;
 //if (isset($_POST["address"]) && isset($_POST["age"]) && isset($_POST["university"])) {
  if($_SERVER["REQUEST_METHOD"]=="POST"){
     $name=$_SESSION["name"];
     //echo $name1;
    $address=$_POST["address"];
    $age=$_POST["age"];
    $university=$_POST["university"];
    if(strlen($address)==0 || empty($address)){
      $checkaddress="Please re-enter your Address.";
    }
    else if($age<=17){
      $checkage="Re-enter your age(should be greater than 18).";
    }
    else if(strlen($university)==0 || empty($university)){
      $checkuniversity="Please re-enter the University name.";
    }
    else{
        header("location:page3.php?name2='.$name.'");
    }
  }
?>



<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Verification-2</title>
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
          if($checkaddress)
          {
              echo
              '<div for="signup" class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error!</strong> '.$checkaddress.'
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          }
          else if($checkage)
          {
              echo
              '<div for="signup" class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error!</strong> '.$checkage.'
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          }
          else if($checkuniversity)
          {
              echo
              '<div for="signup" class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error!</strong> '.$checkuniversity.'
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

                          <form action=page2.php method="post">
                              <div class="form-group row">
                                  <label for="address" class="col-sm-3 col-form-label">Address:</label>
                                  <div class="col-sm-9">
                                      <input style="border:0.5px solid;" required data-toggle="tooltip"
                                          title="Please ensure you fill this field" type="text"
                                          class="form-control" id="address" name="address"
                                          placeholder="Enter your Address"
                                          value="<?php echo isset($_POST["address"]) ? htmlspecialchars($_POST["address"], ENT_QUOTES) : ''; ?>">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="age" class="col-sm-3 col-form-label">Age:</label>
                                  <div class="col-sm-9">
                                      <input style="border:0.5px solid;" data-toggle="tooltip"
                                          title="Please ensure you fill this field" required type="number"
                                          class="form-control" id="age" name="age"
                                          placeholder="Enter your Age(greater than 18)"
                                          value="<?php echo isset($_POST["age"]) ? htmlspecialchars($_POST["age"], ENT_QUOTES) : ''; ?>">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="university" class="col-sm-3 col-form-label">University:</label>
                                  <div class="col-sm-9">
                                      <input style="border:0.5px solid;" data-toggle="tooltip"
                                          title="Please ensure you fill this field" required type="text"
                                          class="form-control" id="university" name="university"
                                          placeholder="Enter your University name"
                                          value="<?php echo isset($_POST["university"]) ? htmlspecialchars($_POST["university"], ENT_QUOTES) : ''; ?>">
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
