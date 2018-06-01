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
            <h1>Title</h1>
        </div>
        <div class="panel-body">
          <div class="row">
            Hello
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