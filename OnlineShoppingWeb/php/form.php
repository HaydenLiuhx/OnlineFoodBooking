<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
  <title>form.php</title>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php echo "<link rel='stylesheet' href='https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css'>"; ?>
  <?php echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/form.css\" />"; ?>
</head>
<body>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="email.php" method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Contact Details</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name <span style="color:red">
*
</span></label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe"  required >
            <label for="email"><i class="fa fa-envelope"></i> Email <span style="color:red">
*
</span></label>
            <label id="validate_email_message" style="color:red"></label>
            <input type="text" id="email" name="email" placeholder="john@example.com" onblur="validate()" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address <span style="color:red">
*
</span></label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
            <label for="city"><i class="fa fa-institution"></i> Suburb <span style="color:red">
*
</span></label>
            <input type="text" id="city" name="city" placeholder="Rockdale" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State <span style="color:red">
*
</span></label>
                <input type="text" id="state" name="state" placeholder="NSW" required>
              </div>
              <div class="col-50">
                <label for="country">Country <span style="color:red">
*
</span></label>
                <input type="text" id="country" name="country" placeholder="Australia" required>
              </div>
            </div>
          </div>
       
        </div>

        <input type="submit" value="Purchase" class="btn">
      </form>
    </div>
  </div>

</div>
<script type="text/javascript">
$(document).ready(function(){

function validateEmail(email) {
  var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return reg.test(email);
}


    $("#email").blur(function(){
      var $result = $("#validate_email_message");
      var email = $("#email").val();
      $result.text("");
      $result.hide();

    if (validateEmail(email)) {
      $result.hide();
    } else {
      $result.show();
      $result.text(email + " is not valid :(");
      $result.css("color", "red");
    }

    });
});

</script>


</body>
</html>