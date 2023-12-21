<?php
	require'config.php';
	if(ISSET($_POST['filter'])){
		$category=$_POST['category'];

		if($category == 'day'){
		
			$query=mysqli_query($conn, "SELECT * FROM medicine_stock WHERE quantity != 0 AND DATE(dateExpired) = DATE(NOW()) ORDER BY `dateExpired` DESC") or die(mysqli_error());
			while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['inventoryID']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['brand']." ".$fetch['generic']."</td><td  style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['quantity']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['dateExpired']."</td></tr>";
			}

		}elseif ($category == 'week') {
			$query=mysqli_query($conn, "SELECT * FROM medicine_stock WHERE quantity != 0 AND dateExpired > CURDATE() AND YEARWEEK(dateExpired) = YEARWEEK(NOW()) ORDER BY `dateExpired` DESC") or die(mysqli_error());
			while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['inventoryID']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['quantity']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['dateExpired']."</td></tr>";
			}

		}elseif ($category == 'month'){
			$query=mysqli_query($conn, "SELECT * FROM medicine_stock WHERE quantity != 0 AND dateExpired > CURDATE() AND MONTH(dateExpired) = MONTH(NOW()) AND YEAR(dateExpired) = YEAR(CURDATE()) ORDER BY `dateExpired` DESC") or die(mysqli_error());
			while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['inventoryID']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['quantity']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['dateExpired']."</td></tr>";
			}

		}elseif ($category == 'year') {
			$query=mysqli_query($conn, "SELECT * FROM medicine_stock WHERE quantity != 0 AND dateExpired > CURDATE() AND YEAR(dateExpired) = YEAR(CURDATE()) ORDER BY `dateExpired` DESC") or die(mysqli_error());
			while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['inventoryID']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['quantity']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['dateExpired']."</td></tr>";
			}
			
		}else{
			$query=mysqli_query($conn, "SELECT * FROM medicine_stock WHERE quantity != 0 AND dateExpired > CURDATE() AND YEAR(dateExpired) = YEAR(CURDATE()) ORDER BY `dateExpired` DESC") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['inventoryID']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['quantity']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['dateExpired']."</td></tr>";
		}
		}



	}else{
		$query=mysqli_query($conn, "SELECT * FROM medicine_stock WHERE quantity != 0 AND dateExpired > CURDATE() AND YEAR(dateExpired) = YEAR(CURDATE()) ORDER BY `dateExpired` DESC") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['inventoryID']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['brand']." ".$fetch['generic']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['strength']."/ ".$fetch['form']."/ ".$fetch['volume']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['quantity']."</td><td style='border: 1px solid; text-align: center; border-collapse: collapse;'>".$fetch['dateExpired']."</td></tr>";
		}
	}
?>