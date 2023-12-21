<?php
	require'config.php';
	if(ISSET($_POST['filter'])){
		$category=$_POST['category'];
		
		$query=mysqli_query($conn, "SELECT * FROM `medicine_stock` WHERE `quantity`<= '$category' AND dateExpired > curdate() AND quantity != 0") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['inventoryID']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['quantity']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['dateExpired']."</td></tr>";
		}
	}else{
		$query=mysqli_query($conn, "SELECT * FROM `medicine_stock` WHERE `quantity`<= 50 AND dateExpired > curdate() AND quantity != 0") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['inventoryID']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['quantity']."</td><td style='border: 1px solid; border-collapse: collapse; text-align: center;'>".$fetch['dateExpired']."</td></tr>";
		}
	}
?>