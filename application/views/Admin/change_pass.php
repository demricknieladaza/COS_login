<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="panel panel-headline">
        <div class="panel-heading">
          <?php if($this->session->flashdata('success')){ ?>
            <p class="alert alert-success alert-dismissible fade in" id="success-alert">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $this->session->flashdata('success');} ?>
            </p>
          <?php if($this->session->flashdata('error')){ ?>
            <p class="alert alert-danger alert-dismissible fade in" id="success-alert">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $this->session->flashdata('error');} ?>
            </p>
            <h1>Change Password</h1>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="form col-md-6">
            
              <?php echo form_open('admin/changemypass'); ?>
              <div class="form-group">
                <input type="password" class="form-control" name="opassword" placeholder="Old Password"/>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="npassword" placeholder="New password"/>
              </div>
              <button class="btn btn-primary">Change</button>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>