<?php 

 $dbhost = 'localhost'; 
 $dbuser = 'root'; 
 $dbpass = ''; 
 $dbname = 'inventory'; 
 
 $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 
 
if (mysqli_connect_errno()) 
	{    
		die ('Failed to connect to MySQL: ' . mysqli_connect_error()) ; 
	} 
 
if (!isset($_POST['username'], $_POST['password'], $_POST['lname'], $_POST['fname'], $_POST['userType'])) 
	{   
		die ('Please complete the registration form!'); 
	} 

	if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['lname']) || empty($_POST['fname']) || empty($_POST['userType'])) 
	{  
		die ('Please complete the registration form'); 
	} 
 

	if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) 
	{  
		die ('Password must be between 5 and 20 characters long!') ; 
	} 
 
	if ($stmt = $con->prepare('SELECT rid, password FROM users WHERE username = ?')) 
		{  
			//  (s = string, i = int, b = blob, etc),  

			 $stmt->bind_param('s', $_POST['username']);  
			 $stmt->execute();  
			 $stmt->store_result();  
			  if ($stmt->num_rows > 0) 
			  {   
			  	echo "<script>alert('Username Exists! Please choose another.');document.location.href='sign-in.php'</script>/n";  
			  } 

			  else 
			  {   
			   if ($stmt = $con->prepare('INSERT INTO users (username, password, lname, fname, userType) VALUES (?, ?, ?, ?, ?)')) 
			   	{        
			   		$password = md5($_POST['password']); //PASSWORD_DEFAULT     
			   		$stmt->bind_param('sssss', $_POST['username'], 
			   		$password, $_POST['lname'], $_POST['fname'], $_POST['userType']);   
			   		$stmt->execute();    
			   		header("Location: sign-in.php") ;    
			   	}

			   else 
			   	{        
			   		echo 'Could not prepare statement!'; 
			   	}  
			  }  

			  $stmt->close(); 
			   	
		} 
			   

	else 
		{    
			echo 'Could not prepare statement!'; 
		} 
			 $con->close(); 
?> 

