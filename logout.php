<?php
	session_start();
	session_destroy();
	echo "<script>document.location.href='sign-in.php'</script>/n";
?>