<style type="text/css">
  textarea { resize: vertical; }
</style>
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="panel panel-headline">
        <div class="panel-heading">
          <?php if($this->session->flashdata('success')){ ?>
          <p class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success');} ?>
          </p>
          <h1>Staff Manager</h1>
        </div>
        <div class="panel-body">
          <div class="table-responsive">  
          <br />  
          <table id="user_data" class="table table-bordered table-striped">  
           <thead>  
            <tr>  
             <th>ID</th>  
             <th>First Name</th>  
             <th>Last Name</th>
             <th>Task</th>
            </tr>   
           </thead>  
          </table>  
         </div>  
        </div>
      </div>
    </div>
  </div>
</div>
<div id="userModal2" class="modal fade">  
      <div class="modal-dialog">  
          <?php echo form_open('admin/assign'); ?>
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button> 
                          <h4 class="umodal-title"> </h4>  
                     </div>  
                     <div class="modal-body"> 
                        <div class="form-group">
                          <label><b>Name: </b><p id="ufname" name="ufname"></p>  </label>
                          <!-- <input type="text" name="ufname" id="ufname" class="form-control" placeholder="First Name" required > -->
                        </div>
                        <div class="form-group">
                          <input type="hidden" name="uid" id="uid" class="form-control" placeholder="id" required >
                        </div>
                        <div class="form-group">
                          <label>Task</label>
                          <textarea name="task" class="form-control" required ></textarea>
                          <!-- <input type="text" name="ulname" id="ulname" class="form-control" placeholder="Last name" required > -->
                        </div> 
                     </div>  
                     <div class="modal-footer"> 
                        <input type="hidden" name="id" id="id" />  
                          <input type="submit" name="action" class="btn btn-success acts" value="Assign" /> 
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                     </div>  
                </div>  
           <?php echo form_close(); ?>
      </div>  
 </div>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
  var dataTables = $('#user_data').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"<?php echo base_url() . 'admin/fetch_user'; ?>",
      type:"POST"
    },
    "columnDefs":[
      {
        "targets":[3],
        "orderable":false,
      }
    ]
  });
    $(document).on('click', '.assign', function(){  
       var user_id = $(this).attr("id");  
       $.ajax({  
            url:"<?php echo base_url().'admin/getuser'; ?>",  
            method:"POST",  
            data:{user_id:user_id},  
            dataType:"json",  
            success:function(data)  
            {  
             $('#userModal2').modal('show');  
             $('#ufname').text(data.fname +" "+ data.lname);  
             $('#ulname').val(data.lname);   
             $('#uid').val(data.id);   
             $('.umodal-title').text("Assign Task");  
             $('#id').val(user_id);  
            }  
       })  
  });
});
</script>