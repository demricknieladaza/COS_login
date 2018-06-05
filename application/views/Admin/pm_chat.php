<div class="panel-heading">
    <h3 class="panel-title">Chats</h3>
</div>
<ul class="list-group">
	<div class="user">
		<li class="groupchat list-group-item">Group Chat</li>
		<?php foreach ($users as $user): ?>
			<?php if($user->id == $this->session->userdata('userdata')['id']): ?>
			<?php else: ?>
				<li class="userchat list-group-item" id="<?php echo $user->fname; ?>" value="<?php echo $user->id ?>" ><?php echo $user->fname; ?></li>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</ul>

<script>


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
       $.ajaxSetup({
       	cache: false
       });
       interval = setInterval( function(){ $('#chatlogsa').load("http://localhost/php-chat/logs.php?key=getmy&fname="+fname+"&user_id="+id+"&my_id=<?php echo $this->session->userdata('userdata')['id']; ?>&my_fname=<?php echo $this->session->userdata('userdata')['fname']; ?>"); }, 2000 ); 
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