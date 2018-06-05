<ul style="padding: 0 25px;margin: 15px 25px;">
	<div class="user">
		<?php foreach ($users as $user): ?>
			<?php if($user->id == $this->session->userdata('userdata')['id']): ?>
			<?php else: ?>
				<li class="userchat" id="<?php echo $user->fname; ?>" value="<?php echo $user->id ?>" ><?php echo $user->fname; ?></li>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</ul>

<script>


$(document).on('click', '.userchat', function(){
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
       setInterval( function(){ $('#chatlogsa').load("http://localhost/php-chat/logs.php?key=getmy&fname="+fname+"&user_id="+id+"&my_id=<?php echo $this->session->userdata('userdata')['id']; ?>&my_fname=<?php echo $this->session->userdata('userdata')['fname']; ?>"); }, 2000 ); 
  });

</script>