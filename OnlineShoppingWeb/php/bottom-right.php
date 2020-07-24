<?php
// Start the session
//$_SESSION["id"] = $id;
//$_SESSION["product"] = $row;
//items = [product1,product2,product3,...]
session_start();

$number = 0;

if (isset($_REQUEST["clear"])){
	unset($_SESSION["product"]);
	unset($_SESSION["items"]);
	unset($_SESSION["showForm"]);
  
}
//if(isset($_SESSION["product"]) && $_REQUEST["quantity"] > 0){
if(isset($_SESSION["product"] ) && $_GET["quantity"] > 0){
	$id = $_SESSION["product"][product_id];
	$_SESSION["items"][$id][product_id] = $_SESSION["product"][product_id];
    $_SESSION["items"][$id][product_name] = $_SESSION["product"][product_name];
    $_SESSION["items"][$id][unit_price] = $_SESSION["product"][unit_price];
    $_SESSION["items"][$id][unit_quantity] = $_SESSION["product"][unit_quantity];
    //form method->get ;input name->quantity
    $_SESSION["items"][$id][quantity] = $_GET["quantity"];
}
foreach ($_SESSION["items"] as $key => $item) {
	$number += $item[quantity];
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<title>bottom-right.php</title>
	<?php echo "<link rel='stylesheet' href='https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css'>"; ?>
	<?php echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/mystyle.css\" />"; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- some -->
  
</head>
<body>

<div id="info-banner" style="display:none" class="alert alert-info">
  <strong style="color: red; font-size: x-large;">No items in Cart! Please add something.</strong> 
</div>
	
  <strong align="center" style="color: black; font-size: x-large;">My Check List</strong>
  <hr>
	<div class="row">
<div class="col-25" >
  <div class="container">
  <!--retrive-->
  <!-- <?php foreach($_SESSION["items"] as $product){ ?>
      <p><a href="#"><?php echo $product["product_name"];?></a> * <?php echo $product["quantity"];?><span class="price">$<?php echo $product["unit_price"]*$product["quantity"];?></span></p>
  <?php } ?> -->
  
  
  <table id='customers'>
  	<thead align="left" style="display: table-header-group">
  	<tr>
  		<th>No</th>
  		<th>Name</th>
  		<th>UnitPrice</th>
  		<th>UnitQuality</th>
  		<th>Total</th>
  		<th>Price</th>
  	</tr>
  	</thead>
  <tbody>
  	<?php 
//$total = 0;

foreach ($_SESSION["items"] as $product) :?>
	<?php $money = $product[unit_price]*$product[quantity]; ?>
  <tr class="item_row">
        <!-- <td><?php echo ++$total; ?></td> -->

        <td> <?php echo $product[product_id]; ?></td>
        <td> <?php echo $product[product_name]; ?></td>
        <td> <?php echo $product[unit_price]; ?></td>
        <td> <?php echo $product[unit_quantity]; ?></td>
        <td> <?php echo $product[quantity]; ?></td>
        <td> <?php echo $money; ?></td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>
<hr>
    <h4>Cart<span class="price" style="color:black"><i class="fa fa-shopping-cart"></i><b id='number-items'>  <?php echo $number;?></b></span></h4>
    <hr>

    <p>Total Prices <span class="price" style="color:black"><b>$
    <?php
    $total = 0;
    foreach($_SESSION["items"] as $product){
      $total += $product["unit_price"]*$product["quantity"];
    }
    echo $total;
    ?></b></span></p>
  </div>
  <br>
  <a href="top-right.php?showForm=1" target="top-right" class="button" id="checkout-btn">Check Out</a>
<a href="bottom-right.php?clear=1" target="bottom-right" class="button button_red" style="float:right">Clear</a>

</div>
</div>

<script>

  document.getElementById("checkout-btn").onclick=checkout;
  function checkout() {	
    //check out total count. If total count is 0, show info banner, otherwise target to right-top ifram
    
    var num = document.getElementById("number-items").innerHTML;
    if (num == 0) 
    {
      //show

      var popUp = document.getElementById("info-banner");
      popUp.style.display = "block";
    }
    
  }
</script>

</body>
</html>
