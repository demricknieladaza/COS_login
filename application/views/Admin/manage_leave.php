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
            <h1>Leave Form</h1>
        </div>
        <div class="panel-body">
          <div class="row">
             <div class="table-responsive">  
             <br />  
             <table id="user_data" class="table table-bordered table-striped">  
              <thead>  
               <tr>  
                <th>Leave ID</th>  
                <th>Name</th>  
                <th>From</th>
                <th>To</th>
                <th>Reason</th>
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
</div>
<script type="text/javascript">
  $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
  var dataTables = $('#user_data').DataTable({
    "processing":true,
    "serverSide":true,
    "order":[],
    "ajax":{
      url:"<?php echo base_url() . 'admin/fetch_leave'; ?>",
      type:"POST"
    },
    "columnDefs":[
      {
        "targets":[4,5],
        "orderable":false,
      }
    ]
  });
   $(document).on('click', '.approve', function(){  
       var user_id = $(this).attr("id");  
       if(confirm("Are you sure you ?"))  
       {  
          $.ajax({  
               url:"<?php echo base_url().'admin/approveleave'; ?>",  
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