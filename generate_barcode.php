
		<?php
		include 'barcode128.php';
		$barcode = $_POST['barcode'];
		$amount = $_POST['amount'];


			$response = "";
			$response .= "<div class='row'>";
		for($i=1;$i<=$amount;$i++){

            $response .= "<div style='display: inline-block; margin-left: 10px; margin-bottom: 4px;'>";
            $response .= "<p>".bar128(stripcslashes($barcode))."</p>";  
            $response .= "</div>"; 	
			$response .= "<iframe name='print_frame' width='0' height='0' frameborder='0'  src='about:blank'></iframe>";
			}
			

        	$response .= "</div>";    
		echo $response;
		exit;
		?>