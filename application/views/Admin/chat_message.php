<?php 
 ?>
<script>

function submitChat() {
	if(form1.uname.value == '' || form1.msg.value == '') {
		alert("ALL FIELDS ARE MANDATORY!!!");
		return;
	}
	var form = document.getElementById("form1");
	var uname = form1.uname.value;
	var msg = form1.msg.value;
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
			form.reset();
		}
	}
	
	xmlhttp.open('GET','http://localhost/php-chat/insert.php?key=send&uname='+uname+'&msg='+msg,true);
	xmlhttp.send();

}
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

$(document).ready(function(e){
	var fname = $(this).attr("id");
	var x = document.getElementById("chatlogs");
	var x1 = document.getElementById("chatlogsa");
	var y = document.getElementById("btn-chata");
	var y1 = document.getElementById("btn-chatmy");
	document.getElementById("userid").value = fname;
	$.ajaxSetup({
		cache: false
	});
	if(x1.style.display == "block" && y1.style.display == "block" ){
		setInterval( function(){ $('#chatlogsa').load("http://localhost/php-chat/logs.php?key=getmy&fname="+fname+"&user_id=<?php echo $this->session->userdata('userdata')['id']; ?>"); }, 2000 );
	}
	else{
		setInterval( function(){ $('#chatlogs').load("http://localhost/php-chat/logs.php?key=getall&uname=<?php echo $this->session->userdata('userdata')['fname']; ?>"); }, 2000 );
	}
	
});

</script>
<div class="panel-heading">
    <span class="glyphicon glyphicon-comment"></span> Group Chat
    <div class="btn-group pull-right">
    </div>
</div>
<div class="panel-body" style="height: 550px;">
        <div id="chatlogs">
        LOADING CHATLOG...
        </div>
        <div id="chatlogsa" style="display:none;">
        LOADING CHATLOG...
        </div>
</div>
<form id="form1" name="form1"> 
	<input type="hidden" name="uname" value="<?php echo $this->session->userdata('userdata')['fname']; ?>" /> <br />
	<input type="hidden" name="userid" id="userid" value="" /> <br />
<div class="panel-footer">
    <div class="input-group">
        <input id="btn-input" name="msg" type="text" class="form-control input-sm" placeholder="Type your message here..." />
        <span class="input-group-btn">
            <a type="submit" class="btn btn-warning btn-sm" id="btn-chata" onclick="submitChat()" >Send</a>
            <a type="submit" class="btn btn-warning btn-sm" id="btn-chatmy" style="display:none;" onclick="submitChats()" >Sends</a>
        </span>
    </div>
</div>
</form>



<style type="text/css">
	.chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    overflow-y: scroll;
    height: 250px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}
.container1 {
    border: 2px solid #30d7ff;
    background-color: #a0edff;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
}

.darker {
    border-color: #ccc;
    background-color: #ddd;
}

.container1::after {
    content: "";
    clear: both;
    display: table;
}


</style>