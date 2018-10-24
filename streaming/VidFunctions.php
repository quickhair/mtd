<?php
	
	
	$num = $_POST["num"];
	
	if (isset($_POST["time"])) {
		$time = $_POST["time"];
	}else{
		$time = 0;
	}
	
	$txt = choose($num , $time);
	 
	 return 45;
	 
	function choose($num , $time){
		
		if($num == 1){
			clearstatcache();
			if(file_exists("attack.txt")){
				return 1;
			} else{
				return 0;
			}
			
		} else if($num == 2){
			//$txt = lookFile();
			return 45;
			
		} else {
			$myfile = fopen("time.txt" , "w");
			fwrite($myfile , $time);
			fclose($myfile);
			return 0
		
		}	
	}


	//function reads in the time from a file and then destroys that file and the attack trigger file
	function lookFile(){
		//clearstatcache();
		if(file_exists("time.txt")){
			$myfile = fopen("time.txt" , "r");
			$txt = fgets($myfile);
			fclose($myfile);
			destroyFile("time.txt");
			destroyFile("attack.txt");
			return $txt;
		}
		else{
			return 0;
		}
	}
	
	//destroys whatever file is sent to it
	function destroyFile($filename){
		unlink($filename);
	}
	
	
?>