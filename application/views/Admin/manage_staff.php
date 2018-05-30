<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="panel panel-headline">
        <div class="panel-heading">
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
        "targets":[],
        "orderable":false,
      }
    ]
  });
});
</script>