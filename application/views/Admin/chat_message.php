<?php 
 ?>
<script type="text/javascript">
	function submitChat(){
		if(form1.uname.value == '' || form1.msg.value == ''){
			alert('ERROROR');
		}
		var uname = form1.uname.value;
		var msg = form1.msg.value;
		var xmlhttp = new XMLHttpRequest();

		 xmlhttp.onreadystatechange = function(){
		 	if(xmlhttp.readyState==4&&xmlhttp.status==200){
		 		document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
		 	}
		 };
		 xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
		 xmlhttp.send();
	}
</script>
<form name="form1">
	<input type="text" name="uname"><br>
	message:<br>
	<textarea name="msg"></textarea><br>
	<a href="#" onClick="submitChat()" >Send</a><br><br>

	<div id="chatlogs">
		loading chatlogs.... 
	</div>
</form>