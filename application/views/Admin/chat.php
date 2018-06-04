<script
  src="http://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<div class="main">
  <div class="main-content">
    <div class="container-fluid col-md-8">
      <div class="panel panel-headline">
        <!-- <div class="panel-heading">
          <?php if($this->session->flashdata('success')){ ?>
            <p class="alert alert-success alert-dismissible fade in" id="success-alert">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $this->session->flashdata('success');} ?>
            </p>
            <h1>Title</h1>
        </div>
        <div class="panel-body">
          <div class="row">
          </div>
        </div> -->
        <?php include "chat_message.php"; ?>
      </div>
    </div>
    <div class="container-fluid col-md-4">
      <div class="panel panel-headline">
        <!-- <div class="panel-heading">
          <?php if($this->session->flashdata('success')){ ?>
            <p class="alert alert-success alert-dismissible fade in" id="success-alert">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $this->session->flashdata('success');} ?>
            </p>
            <h1>Title</h1>
        </div>
        <div class="panel-body">
          <div class="row">
          </div>
        </div> -->
        <?php include "pm_chat.php"; ?>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>