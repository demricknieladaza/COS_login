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
                  <span class="title" >New Member</span>
                </p>
              </div>
              </a>
            </div>
            <div class="col-md-3">
              <a type='button' data-toggle='modal' data-target='#qod' >
              <div class="metric">
                <span class="icon"><i class="fa fa-download"></i></span>
                <p>
                  <span class="number">Upload</span>
                  <span class="title" >Quote of the day</span>
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
          <div class="row">
            <div class="col-md-9">
              <div id="headline-chart" class="ct-chart"></div>
            </div>
            <div class="col-md-3">
              <div class="weekly-summary text-right">
                <span class="number">2,315</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 12%</span>
                <span class="info-label">Total Sales</span>
              </div>
              <div class="weekly-summary text-right">
                <span class="number">$5,758</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 23%</span>
                <span class="info-label">Monthly Income</span>
              </div>
              <div class="weekly-summary text-right">
                <span class="number">$65,938</span> <span class="percentage"><i class="fa fa-caret-down text-danger"></i> 8%</span>
                <span class="info-label">Total Income</span>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="modal fade" id="qod" role="dialog">

    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Quote of the day image</h4>
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