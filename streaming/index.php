<!DOCTYPE html>

<html>
<head>
<meta charset="utf-8">
<title>Super Stream XL</title>
<script src="jquery-1.12.3.min.js"></script>
</head>
<body onload = "setTimeResume();" onunload = "makeFile();">
<div id = "video" style="text-align:center">

		<input type="submit" onclick="playPause()" value="Play/Pause"></input>
		<input type="submit" onclick="reset()" value="Reset Video"></input>
	
<br><br>
		<video id="stream" class="stream" width="1080" height="720" controls>
		<source src= "Video1.mp4" type="video/mp4">
		</video>
</div>
<script>
    
	var stream = document.getElementById("stream");
	var flag = 0;
	 var steve;
	 
	 
	function playPause(){
	if (stream.paused){
	//stream.play();
	 setTimeResume();
	 stream.play();
	}
	else{
	stream.pause();
	var time = stream.currentTime;
	console.log("Securing Information....");
	$.post('writeTime.php',{time: time});
	console.log("Information Secure, ready for migration!");
	}

}
	
	function reset(){
		stream.currentTime = 0;
}
	
	
	function streamPause(){
	
	if(flag == 0){
	stream.pause();
	makeFile();
	flag = 1;
	}
}

function makeFile(){
	console.log("Securing Information....");
	$.post('writeTime.php',{time: stream.currentTime});
	console.log("Information Secure, ready for migration!");

}
	/*
	function setCookie(cname, exdays){
		var d = new Date();
		d.setTime(d.getTime() + (exdays*24*60*60*1000));
		var expires = "expires="+d.toUTCString();
		document.cookie = cname + "=" + document.getElementById("stream").currentTime + "; " + expires;
		//console.log(document.getElementById("stream").currentTime);
}
	
	function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}
	
	*/
setInterval(function(){  

		//console.log(flag);
		
		
		//setCookie("time", 365);
		//check for the attack trigger
		$.post('seeAttack.php', 
		function(data){
		if(data.localeCompare("1") == 0){
			console.log("Attack Detected!");
		//	flag = 1;
			streamPause();
			}
		});
		
}, 2000);
		
	
	
	

function setTimeResume(){
/**
	var timestamp = getCookie("time");
	if(timestamp != ""){
		var time = getCookie("time");
		
		stream.currentTime = parseFloat(time);
		
		stream.play();
		
	}
		else{
		setCookie("time" , 365);
		}*/
	//check to see if there is a file and set the time if there is
//	console.log("hello");
	$.post('findTime.php', 
		function(data){
				//console.log(data);
				time = parseFloat(data);
				//time = 45;
				//console.log("in here!!!!");
				//console.log(time);
				if(time>=0){
				steve = time;
				stream.currentTime = time;
				stream.play();
				}
				else{
				}
	});
		
	
}
	
	
	
	
	
</script>

	
</body>
</html>
