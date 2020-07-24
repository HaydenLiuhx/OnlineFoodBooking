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
	<title>top-right.php</title>
	<?php echo "<link rel='stylesheet' href='https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css'>"; ?>
	<?php echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/mystyle.css\" />"; ?>
	
	
</head>
<body>

<?php
	$dbhost = 'rerun';  //数据库地址
	$dbuser = 'potiro';       //数据库用户名
	$dbpass = 'pcXZb(kL'; // 数据库用户密码
	$dbname = 'poti'; //数据库名称
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if ($connection->connect_error) {
    	die("Connection failed: " . $connection->connect_error);
	}
	$id = $_GET['data'];
	$_SESSION["id"] = $id;
	$sql = "select * from products where (product_id = $id)";
	$result = mysqli_query($connection,$sql);
	$rows = mysqli_num_rows($result);
	if($rows > 0){
		//不能用while，跳转页面
		if ($row = mysqli_fetch_array($result)) {
    			// table 
				echo "<table id='customers'>";
				echo "<tr>\n";
				echo "<th>No</th>";
				echo "<th>Name</th>";
				echo "<th>UnitPrice</th>";
				echo "<th>UnitQuality</th>";
				echo "<th>Stock</th>";
				echo "</tr>";

				echo "<tr>\n";
				echo "<td>$row[product_id]</td>";
				echo "<td>$row[product_name]</td>";
				echo "<td>$row[unit_price]</td>";
				echo "<td>$row[unit_quantity]</td>";
				echo "<td>$row[in_stock]</td>";
				echo "</tr>";

				echo "</table>";
				$_SESSION["product"] = $row;
				echo '
				<div>
				<form name="thisForm" action="bottom-right.php" method="get" target="bottom-right" >
					Quantity:
					<input type="number" id="quantity" name="quantity" min="1" value="1" />
					<input type="submit" value="Add" />
				 </form>
				 </div>';
				 //onsubmit="alert('Quantity is ' + thisForm.quantity.value + '!')"

		}
	}
		mysqli_close($connection);
		if(isset($_REQUEST["showForm"]) && (count($_SESSION["items"]) != 0)){
			include('form.php');
		} 
		
	
?>

</body>
</html>