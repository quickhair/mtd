<?php
		
		//clearstatcache();
		$_GET['#t']  = 45;
			if(file_exists("attacked.txt")){
				echo 1;
			} else{
				echo 0;
			}
?>