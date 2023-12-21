<?php
	require'config.php';
	if(ISSET($_POST['filter'])){
		$category=$_POST['category'];

		if($category == 'day'){
		
			$query=mysqli_query($conn, "SELECT billID, brand, generic, strength, form, volume, SUM(quantity) as quantity, price, SUM(totalPrice) as totalPrice, transactDate FROM billings WHERE DATE(transactDate) = DATE(NOW()) AND transactionID != 0 GROUP BY inventoryID ORDER BY `transactDate` DESC") or die(mysqli_error());
			while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['billID']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['transactDate']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['quantity']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['price']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['totalPrice']."</td></tr>";
			}

		}elseif ($category == 'week') {
			$query=mysqli_query($conn, "SELECT billID, brand, generic, strength, form, volume, SUM(quantity) as quantity, price, SUM(totalPrice) as totalPrice, transactDate FROM billings WHERE YEARWEEK(transactDate) = YEARWEEK(NOW()) AND transactionID != 0 GROUP BY inventoryID ORDER BY `transactDate` DESC") or die(mysqli_error());
			while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['billID']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['transactDate']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['quantity']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['price']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['totalPrice']."</td></tr>";
			}

		}elseif ($category == 'month'){
			$query=mysqli_query($conn, "SELECT billID, brand, generic, strength, form, volume, SUM(quantity) as quantity, price, SUM(totalPrice) as totalPrice, transactDate FROM billings WHERE MONTH(transactDate) = MONTH(NOW()) AND YEAR(transactDate) = YEAR(CURDATE()) AND transactionID != 0 GROUP BY inventoryID ORDER BY `transactDate` DESC") or die(mysqli_error());
			while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['billID']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['transactDate']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['quantity']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['price']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['totalPrice']."</td></tr>";
			}

		}elseif ($category == 'year') {
			$query=mysqli_query($conn, "SELECT billID, brand, generic, strength, form, volume, SUM(quantity) as quantity, price, SUM(totalPrice) as totalPrice, transactDate FROM billings WHERE YEAR(transactDate) = YEAR(CURDATE()) AND transactionID != 0 GROUP BY inventoryID ORDER BY `transactDate` DESC") or die(mysqli_error());
			while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['billID']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['transactDate']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['quantity']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['price']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['totalPrice']."</td></tr>";
			}
			
		}else{
			$query=mysqli_query($conn, "SELECT billID, brand, generic, strength, form, volume, SUM(quantity) as quantity, price, SUM(totalPrice) as totalPrice, transactDate FROM billings WHERE transactionID != 0 GROUP BY inventoryID ORDER BY `transactDate` DESC") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['billID']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['transactDate']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['quantity']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['price']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['totalPrice']."</td></tr>";
		}
		}



	}else{
		$query=mysqli_query($conn, "SELECT billID, brand, generic, strength, form, volume, SUM(quantity) as quantity, price, SUM(totalPrice) as totalPrice, transactDate FROM billings WHERE transactionID != 0 GROUP BY inventoryID ORDER BY `transactDate` DESC") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['billID']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['transactDate']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['quantity']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['price']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['totalPrice']."</td></tr>";
		}
	}
?>