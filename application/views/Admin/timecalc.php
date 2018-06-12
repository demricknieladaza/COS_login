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
            <h1>Calculate Time</h1>
        </div>
        <div class="panel-body">
          <div class="row">
              <div class='col-sm-6'>
                  <div class="form-group">
                      <div class="bootstrap-iso">
                       <div class="container-fluid">
                        <div class="row">
                          <div class="form-group"> <!-- Date input -->
                              <label class="control-label">Name: <h3><strong><b><?php echo $staff['fname'].' '.$staff['lname']; ?></b></strong></h3></label>
                            </div>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                            <!-- open form -->
                            <input class="form-control" id="id" name="datefrom" value="<?php echo $staff['id']; ?>" type="hidden" />
                            <div class="form-group"> <!-- Date input -->
                              <label class="control-label">FROM</label>
                              <input class="form-control" id="date" name="datefrom" placeholder="MM/DD/YYY" type="text" required />
                            </div>
                            <div class="form-group"> <!-- Date input -->
                              <label class="control-label">TO</label>
                              <input class="form-control" id="date" name="dateto" placeholder="MM/DD/YYY" type="text" required />
                            </div>
                            <div class="form-group"> <!-- Submit button -->
                              <button class="btn btn-primary calc" name="submit" type="submit">Calculate</button>
                            </div>
                            <!-- end form -->
                          </div>
                        </div>   
                       </div>
                   </div>
                  </div>
              </div>
          </div>
          <div class="row">
            <table id="user_data" class="table table-bordered table-striped" style="width:100%;">  
             <thead>  
              <tr>  
               <th>ID</th>  
               <th>First Name</th>  
               <th>Last Name</th>
               <th>Action</th>
              </tr>   
             </thead>  
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).on('click', '.calc', function(){  
       // var user_id = $(this).attr("id");  
       var datefrom = $("input[name=datefrom]").val();
       var dateto = $("input[name=datefrom]").val();
       var id = $("#id").val();
       
       $.ajax({  
            url:"<?php echo base_url().'admin/calcstafftime'; ?>",  
            method:"POST",  
            data:{id:id,datefrom:datefrom,dateto:dateto},  
            dataType:"json",  
            success:function(data)  
            {  
             // $('#userModal2').modal('show');  
             // $('#ufname').text(data.fname +" "+ data.lname);
             // $('#uid').val(data.id);   
             // $('.umodal-title').text("Assign Task");  
             // $('#id').val(user_id);
             // $.each(data, function() {
             //   $.each(this, function(k, v) {
             //     /// do stuff
             //     console.log(k,v);
             //   });
             // });
             console.log(data);
            }  
       }) 
  });
</script>
<script type="text/javascript">
  $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>
<script>
    $(document).ready(function(){
      var date_input=$('input[id="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>