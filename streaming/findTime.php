
<?php


if(file_exists("time.txt")){
			//$myfile = fopen("time.txt" , "r");
			$txt = file_get_contents("./time.txt");
			
			//fclose($myfile);
			unlink("time.txt");
			if(file_exists("attacked.txt")){
			unlink("attacked.txt");
			}
			else{
			}
			echo $txt;
			
		}
		else{
			echo 0;
		}
		
?>