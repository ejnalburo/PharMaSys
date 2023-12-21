<?php
	require'config.php';
	if(ISSET($_POST['filter'])){
		$category=$_POST['category'];

		if($category == 'expired'){
		
			$query=mysqli_query($conn, "SELECT * FROM medicine_stock WHERE dateExpired <= CURDATE() ORDER BY dateExpired DESC") or die(mysqli_error());
			while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['inventoryID']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['quantity']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['dateReceived']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['dateExpired']."</td></tr>";
			}

		}elseif ($category == 'out') {
			$query=mysqli_query($conn, "SELECT * FROM medicine_stock WHERE dateExpired > CURDATE() AND quantity = 0 ORDER BY dateExpired DESC") or die(mysqli_error());
			while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['inventoryID']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['quantity']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['dateReceived']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['dateExpired']."</td></tr>";
			}

		}else{
			$query=mysqli_query($conn, "SELECT * FROM medicine_stock WHERE dateExpired <= CURDATE() OR quantity = 0 ORDER BY dateExpired DESC") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['inventoryID']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['quantity']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['dateReceived']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['dateExpired']."</td></tr>";
		}
		}



	}else{
		$query=mysqli_query($conn, "SELECT * FROM medicine_stock WHERE dateExpired <= CURDATE() OR quantity = 0 ORDER BY dateExpired DESC") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['inventoryID']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['quantity']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['dateReceived']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['dateExpired']."</td></tr>";
		}
	}
?>