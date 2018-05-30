<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="panel panel-headline">
        <div class="panel-heading">
          <?php if($this->session->flashdata('success')){ ?>
          <p class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success');} ?>
          </p>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-3">
              <a type='button' data-toggle='modal' data-target='#CreateNew' >
              <div class="metric">
                <span class="icon"><i class="fa fa-plus"></i></span>
                <p>
                  <span class="number">Add</span>
                  <span class="title" >New Staff</span>
                </p>
              </div>
              </a>
            </div>
            <div class="col-md-3">
              <a href="admin/manage_staff">
              <div class="metric">
                <span class="icon"><i class="fa fa-users"></i></span>
                <p>
                  <span class="number">Manage</span>
                  <span class="title" >Staff</span>
                </p>
              </div>
              </a>
            </div>
            <div class="col-md-3">
              <div class="metric">
                <span class="icon"><i class="fa fa-eye"></i></span>
                <p>
                <span class="number">274,678</span>
                <span class="title">Visits</span>
                </p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="metric">
                <span class="icon"><i class="fa fa-bar-chart"></i></span>
                <p>
                  <span class="number">35%</span>
                  <span class="title">Conversions</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="modal fade" id="CreateNew" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add new Member</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open('admin/adduser'); ?>
          <div class="form-group">
            <label for="usr">First Name:</label>
            <input type="text" class="form-control" name="fname" >
          </div>
          <div class="form-group">
            <label for="usr">Last Name:</label>
            <input type="text" class="form-control" name="lname" >
          </div>
          <button type="submit" class="btn btn-primary" >Add</button>
          <?php echo form_close(); ?>
        </div>
    </div>
  </div>
</div>
<script>
  function readURLs(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#bladsh').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }
</script>
<script>
  $(document).ready(function(){
      var max_fields      = 10;
      var wrapper         = $(".input_fields_wrap");
      var add_button      = $(".add_field_button"); 
      
      var x = 1; //initlal text box count
      $(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
              x++; //text box increment
              $(wrapper).append('<div><input type="text" name="req[]" /><a href="#" class="remove_field">Remove</a></div>'); //add input box
          }
      });
      
      $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
          e.preventDefault(); $(this).parent('div').remove(); x--;
      })
  });
</script>
<script>
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});

</script>