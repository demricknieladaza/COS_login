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
            <h1>Manage Tasks</h1>
        </div>
        <div class="panel-body">
          <div class="row">
            <table id="user_data" class="table table-bordered table-striped" width="100%">  
             <thead>  
              <tr>  
               <th width="10%">Task ID</th>  
               <th>Name</th>  
               <th>Task</th>  
               <th>Date</th>
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
<script type="text/javascript" language="javascript">
$(document).ready(function(){
  var dataTables = $('#user_data').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"<?php echo base_url() . 'admin/fetch_task'; ?>",
      type:"POST"
    },
    "columnDefs":[
      {
        "targets":[1,2,4],
        "orderable":false,
      }
    ]
  });
  $(document).on('click', '.done', function(){  
       var user_id = $(this).attr("id");  
       if(confirm("Are you sure you want to mark this task as done?"))  
       {  
          $.ajax({  
               url:"<?php echo base_url().'admin/markdone'; ?>",  
               method:"POST",  
               data:{user_id:user_id},  
               success:function(data)  
               {  
                 dataTables.ajax.reload();  
               }  
          });  
       }  
       else  
       {  
            dataTables.ajax.reload();       
       }  
  });

});
</script>
<script type="text/javascript">
  $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>