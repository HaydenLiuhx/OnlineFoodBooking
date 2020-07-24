
<html lang="en">
<head>

  <title>email.php</title>
</head>
<body>
	
	<?php
session_start();
//mail(to,subject,message,headers,parameters)
echo "Your order is sent to: <b>".$_POST['email']."</b> ! <br>";
// $file = "/ass1/assets/Nioh.jpg";
// echo "string";

// foreach ($_SESSION["items"] as $product){
// 	$money = $product[unit_price]*$product[quantity];
//          echo $product[product_id]; 
//  		 echo $product[product_name]; 
//          echo $product[unit_price]; 
//          echo $product[unit_quantity];
//          echo $product[quantity]; 
//          echo $money; 
// }
$subject = "Order Invoice For ".$_POST['firstname']." From Huangxun-Online";

//$message = $_SESSION["items"];

//$from = "huangxunliu@gmail.com";
//$message = "Hello ".$_POST['firstname'].","."This is your invoice.";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .='Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: My Grocery Online Store <13091172@student.uts.edu.au>' . "\r\n";
$message = "<html>
<head>
<title>Hayden-Online Store</title>
</head>
<body>
<p>
Here are your order details:
</p>
<table cellspacing=\"4\" cellpadding=\"4\" border=\"1\">
	<tr>
	<td>Name:</td>
	<td>" .$_POST['firstname'] . "</td>
	</tr>

	<tr>
	<td>Address:</td>
	<td>" .$_POST['address'] . "</td>
	</tr>

	<tr>
	<td>Suburb:</td>
	<td>" .$_POST['city'] . "</td>
	</tr>

	<tr>
	<td>State:</td>
	<td>" .$_POST['state'] . "</td>
	</tr>

	<tr>
	<td>Country:</td>
	<td>" .$_POST['country'] . "</td>
	</tr>
</table>
";
$message .="<table cellspacing=\"4\" cellpadding=\"4\" border=\"1\">
  	
  	<tr>
  		<th>No</th>
  		<th>Name</th>
  		<th>UnitPrice</th>
  		<th>UnitQuality</th>
  		<th>Total</th>
  		<th>Price</th>
  	</tr>";
  	foreach ($_SESSION["items"] as $item) {
	$number += $item[quantity];
}
$total = 0;
    foreach($_SESSION["items"] as $product){
      $total += $product["unit_price"]*$product["quantity"];
    }
foreach ($_SESSION["items"] as $product ){
	$money = $product[unit_price]*$product[quantity];
    
	$message .= "

  <tr>
        <td>$product[product_id] </td>
        <td>$product[product_name] </td>
        <td>$product[unit_price] </td>
        <td>$product[unit_quantity] </td>
        <td>$product[quantity] </td>
        <td>$money </td>
  </tr>

";
}
$message .="</table>";



$message .= "<table cellspacing=\"4\" cellpadding=\"4\" border=\"1\">
<tr>
<td>Product Numbers:</td>
<td>$number</td>
</tr>
<tr>
<td>Total Price:</td>
<td>$total</td>
</tr>
</table>
</body>
</html>
";


mail($_REQUEST['email'],$subject,$message,$headers);

?>
</body>
</html>