<?php

	//Check page is viewed through the index:
	$filename = basename($_SERVER['PHP_SELF']);
	
	if($filename <> 'index.php')
	{
		die();
	}	
?>
