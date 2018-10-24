<?php
		$time = $_POST['time'];
		$myfile = fopen("time.txt" , "w");
		fwrite($myfile , $time);
		fclose($myfile);
		echo 0;
?>