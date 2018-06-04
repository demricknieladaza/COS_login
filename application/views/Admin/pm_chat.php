<ul style="padding: 0 25px;margin: 15px 25px;">
	<div class="user">
		<?php foreach ($users as $user): ?>
			<?php if($user->id == $this->session->userdata('userdata')['id']): ?>
			<?php else: ?>
				<li class="userchat" id="<?php echo $user->id; ?>" ><?php echo $user->fname; ?></li>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</ul>

<script>

function submitChats() {
	if(form1.uname.value == '' || form1.msg.value == '') {
		alert("ALL FIELDS ARE MANDATORY!!!");
		return;
	}
	var form = document.getElementById("form1");
	var uname = form1.uname.value;
	var msg = form1.msg.value;
	var userid = form1.userid.value;
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
			form.reset();
		}
	}
	
	xmlhttp.open('GET','http://localhost/php-chat/insert.php?key=mysend&user_id='+userid+'&uname='+uname+'&msg='+msg,true);
	xmlhttp.send();

}
$(document).on('click', '.userchat', function(){  
       var user_id = $(this).attr("id");
       var x = document.getElementById("chatlogs");
       var x1 = document.getElementById("chatlogsa");
       var y = document.getElementById("all");
       var y = document.getElementById("my");
       document.getElementById("userid").value = user_id;
       x.style.display = "none";
       x1.style.display = "block";
       y.style.display = "none";
       y1.style.display = "block";
       $.ajaxSetup({
       	cache: false
       });
       setInterval( function(){ $('#chatlogsa').load("http://localhost/php-chat/logs.php?key=getmy&user_id="+user_id+"&uname=<?php echo $this->session->userdata('userdata')['fname']; ?>"); }, 2000 ); 
  });

</script>