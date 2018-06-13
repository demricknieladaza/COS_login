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
                            <input class="form-control" id="id" value="<?php echo $staff['id']; ?>" type="hidden" />
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
               <th>Date</th>  
               <th>Time In</th>  
               <th>Time Out</th>
               <th>Note</th>
               <th>Total Hours</th>
              </tr>   
             </thead>
             <tbody id="tbodyid">
               
             </tbody> 
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="http://www.datejs.com/build/date.js"></script>
<script type="text/javascript">
  $(document).on('click', '.calc', function(){  
       // var user_id = $(this).attr("id");  
       var datefrom = $("input[name=datefrom]").val()+ ' 00:00:00';
       var dateto = $("input[name=dateto]").val()+ ' 99:99:99';
       var id = $("#id").val();
       // alert(dateto);
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
             $("#tbodyid").empty();
             $.each(data, function() {
               $.each(this, function(k, v) {
                 /// do stuff
                 var d = v.date;
                 var dout = Date.parse(d);
                 var $tr = $('<tr>').append(
                             $('<td>').text(v.date),
                             $('<td>').text(v.time_in),
                             $('<td>').text(v.time_out),
                             $('<td>').text(v.note),
                             $('<td>').text(v.total)
                         ).appendTo('#user_data');
                // console.log($tr.wrap('<p>').html());
               });
             });
             // console.log(data);
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