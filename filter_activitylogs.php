<?php
	require'config.php';
	if(ISSET($_POST['filter'])){
		$category=$_POST['category'];
		$logTime = "";

		if($category == 'day'){
		
			$query=mysqli_query($conn, "SELECT logId, action, details, TIME_FORMAT(logTime, '%h:%i:%s %p') as logTime, logDate FROM logs WHERE DATE(logDate) = DATE(NOW()) ORDER BY `logID` DESC") or die(mysqli_error());
			while($fetch=mysqli_fetch_array($query)){
				$logTime= $fetch['logTime'];
			echo"<tr><td>".$fetch['logID']."</td><td>".$fetch['action']."</td><td>".$fetch['details']."</td><td>".$logTime."</td><td>".$fetch['logDate']."</td></tr>";
			}

		}elseif ($category == 'week') {
			$query=mysqli_query($conn, "SELECT logId, action, details, TIME_FORMAT(logTime, '%h:%i:%s %p') as logTime, logDate FROM logs WHERE YEARWEEK(logDate) = YEARWEEK(NOW()) ORDER BY `logID` DESC") or die(mysqli_error());
			while($fetch=mysqli_fetch_array($query)){
				$logTime=$fetch['logTime'];
			echo"<tr><td>".$fetch['logID']."</td><td>".$fetch['action']."</td><td>".$fetch['details']."</td><td>".$fetch['logTime']."</td><td>".$fetch['logDate']."</td></tr>";
			}

		}elseif ($category == 'month'){
			$query=mysqli_query($conn, "SELECT logId, action, details, TIME_FORMAT(logTime, '%h:%i:%s %p') as logTime, logDate FROM logs WHERE MONTH(logDate) = MONTH(NOW()) AND YEAR(logDate) = YEAR(CURDATE()) ORDER BY `logID` DESC") or die(mysqli_error());
			while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td>".$fetch['logID']."</td><td>".$fetch['action']."</td><td>".$fetch['details']."</td><td>".$fetch['logTime']."</td><td>".$fetch['logDate']."</td></tr>";
			}

		}elseif ($category == 'year') {
			$query=mysqli_query($conn, "SELECT logId, action, details, TIME_FORMAT(logTime, '%h:%i:%s %p') as logTime, logDate FROM logs WHERE YEAR(logDate) = YEAR(CURDATE()) ORDER BY `logID` DESC") or die(mysqli_error());
			while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td>".$fetch['logID']."</td><td>".$fetch['action']."</td><td>".$fetch['details']."</td><td>".$fetch['logTime']."</td><td>".$fetch['logDate']."</td></tr>";
			}
			
		}else{
			$query=mysqli_query($conn, "SELECT logId, action, details, TIME_FORMAT(logTime, '%h:%i:%s %p') as logTime, logDate FROM logs WHERE YEAR(logDate) = YEAR(CURDATE()) ORDER BY `logID` DESC") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td>".$fetch['logID']."</td><td>".$fetch['action']."</td><td>".$fetch['details']."</td><td>".$fetch['logTime']."</td><td>".$fetch['logDate']."</td></tr>";
		}
		}



	}else{
		$query=mysqli_query($conn, "SELECT logId, action, details, TIME_FORMAT(logTime, '%h:%i:%s %p') as logTime, logDate FROM logs WHERE YEAR(logDate) = YEAR(CURDATE()) ORDER BY `logID` DESC") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td>".$fetch['logID']."</td><td>".$fetch['action']."</td><td>".$fetch['details']."</td><td>".$fetch['logTime']."</td><td>".$fetch['logDate']."</td></tr>";
		}
	}
?>