<div class="main">
  <div class="main-content">
    <div class="container-fluid">
      <div class="panel panel-headline">
        <div class="panel-heading">
          <div class="row">
            <?php if($this->session->flashdata('success')){ ?>
            <p class="alert alert-success" role="alert">
              <?php echo $this->session->flashdata('success');} ?>
            </p>
            <div class="card bg-success text-white">
              <div class="card-body"><b style="font-size:20px;"><i class="fa fa-tasks" aria-hidden="true" ></i> My Tasks</b></div>
            </div>
          </div>
        </div>
        <div class="panel-body">
          <div class="row">
            <table id="user_data" class="table table-bordered table-striped">  
             <thead>  
              <tr>  
               <th width="10%" text-align="center" >Task ID</th>  
               <th width="50%" style="text-align:center;" >Task</th>  
               <th width="20%" style="text-align:center;" >Date</th>
               <th width="20%" style="text-align:center;" >Status</th>
              </tr>   
             </thead>
             <tbody>
               <?php foreach ($tasks as $task): ?>
                  <tr>
                    <td><?php echo $task->id; ?></td>
                    <td><?php echo $task->task; ?></td>
                    <td><?php echo date("M-d-Y", strtotime($task->date_created)); ?></td>
                    <td><?php echo $task->status; ?></td>
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