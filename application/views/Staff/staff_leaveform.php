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
            <h1>Apply Leave</h1>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="container" style="width: 100%;">
                <div class="row">
                    <div class='col-sm-6'>
                        <div class="form-group">
                            <div class="bootstrap-iso">
                             <div class="container-fluid">
                              <div class="row">
                               <div class="col-md-6 col-sm-6 col-xs-12">
                               	  <!-- open form -->
                               	  <?php echo form_open('staff/submitleave'); ?>
                                  <div class="form-group"> <!-- Date input -->
                                    <label class="control-label">From</label>
                                    <input class="form-control" id="date" name="datefrom" placeholder="MM/DD/YYY" type="text" required />
                                  </div>
                                  <div class="form-group"> <!-- Date input -->
                                    <label class="control-label">TO</label>
                                    <input class="form-control" id="date" name="dateto" placeholder="MM/DD/YYY" type="text" required />
                                  </div>
                                  <div class="form-group"> <!-- Date input -->
                                    <label class="control-label" >Reason</label>
                                    <textarea class="form-control" name="reason" required ></textarea>
                                  </div>
                                  <div class="form-group"> <!-- Submit button -->
                                    <button class="btn btn-primary " name="submit" type="submit">Submit</button>
                                  </div>
                                  <?php echo form_close(); ?>
                                  <!-- end form -->
                                </div>
                              </div>   
                             </div>
                         </div>
                        </div>
                    </div>
                    
                </div>
              <div class="row">
              	<table id="user_data" class="table table-bordered table-striped">  
              	 <thead>  
              	  <tr>   
              	   <th >From</th>  
              	   <th >To</th>
              	   <th >Reason</th>
              	   <th >Status</th>
              	  </tr>   
              	 </thead>
              	 <tbody>
              	   <?php foreach ($leaves as $leave): ?>
              	      <tr>
              	      	<td><?php echo date('M d, Y',strtotime($leave->date_from)); ?></td>
              	      	<td><?php echo date('M d, Y',strtotime($leave->date_to)); ?></td>
              	      	<td><?php echo $leave->reason; ?></td>
              	      	<?php  if($leave->status == 'pending'):?>
              	      	<td style="color: red; "><?php echo $leave->status; ?></td>
              	      	<?php else: ?>
              	      	<td style="color: green; "><?php echo $leave->status; ?></td>
              	      	<?php endif; ?>
              	      </tr>
              	   <?php endforeach;  ?>
              	 </tbody>
              	</table>
              </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<style type="text/css">
  textarea { resize: vertical; }
</style>
<script>
    $(document).ready(function(){
      var date_input=$('input[id="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
<script type="text/javascript">
  $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>