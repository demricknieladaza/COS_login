<div class="panel-heading">
    <h3 class="panel-title">Chats</h3>
</div>
<ul class="list-group">
	<div class="user">
		<li onclick="seen()" class="groupchat list-group-item">Group Chat</li>
		<?php foreach ($users as $user): ?>
			<?php if($user->id == $this->session->userdata('userdata')['id']): ?>
			<?php else: ?>
				<li class="userchat list-group-item" id="<?php echo $user->fname; ?>" value="<?php echo $user->id ?>"  ><?php echo $user->fname; ?></li>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</ul>
<script src='https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js'></script>
<script>
function seen() {

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open('GET','http://localhost/php-chat/insert.php?key=seen&fname='+fname.value+'&my_id=<?php echo $this->session->userdata('userdata')['id']; ?>',true);
	xmlhttp.send();

}

$(document).on('click', '.userchat', function(){
	$("#name").html("<span class='glyphicon glyphicon-comment'></span> "+$(this).attr("id"));
	$("#chats").animate({
	  scrollTop: $('#chats')[0].scrollHeight - $('#chats')[0].clientHeight
	}, 1000);
		clearInterval(interval)
		document.getElementById("form1").reset();
       var x = document.getElementById("chatlogs");
       var x1 = document.getElementById("chatlogsa");
       var y = document.getElementById("btn-chata");
       var y1 = document.getElementById("btn-chatmy");
       document.getElementById("userid").value = fname;
       x.style.display = "none";
       x1.style.display = "block";
       y.style.display = "none";
       y1.style.display = "block";
       $("#fname").val($(this).attr("id"));
       $("#userid").val($(this).attr("value"));
       var fname = $('#fname').val();
	   var id = $('#userid').val();
	   document.getElementById(fname).style.color = "" ;
       document.getElementById(fname).style.border = "none" ;
       document.title = "Dashboard";
       $.ajaxSetup({
       	cache: false
       });
       interval = setInterval( function(){ $('#chatlogsa').load("http://localhost/php-chat/logs.php?key=getmy&fname="+fname+"&user_id="+id+"&my_id=<?php echo $this->session->userdata('userdata')['id']; ?>&my_fname=<?php echo $this->session->userdata('userdata')['fname']; ?>"); }, 2000 ); 
       seen();
  });

	$(document).on('click', '.groupchat', function(){
		location.reload(); 
	  });

</script>

<style type="text/css">
	ul {
  list-style-type: none;
}
</style>