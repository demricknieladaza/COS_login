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
              <a href="<?php echo base_url(); ?>admin/manage_staff">
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
              <a href="<?php echo base_url(); ?>admin/manage_task">
              <div class="metric">
                <span class="icon"><i class="fa fa-tasks"></i></span>
                <p>
                  <span class="number">Manage</span>
                  <span class="title" >Staff Task</span>
                </p>
              </div>
              </a>
            </div>
            <div class="col-md-3">
              <a href="<?php echo base_url(); ?>admin/manage_leave">
              <div class="metric">
                <span class="icon"><i class="fa fa-sticky-note"></i></span>
                <p>
                  <span class="number">Manage</span>
                  <span class="title" >Leave form</span>
                </p>
              </div>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="panel-heading">
              <h1>Online Staff</h1>
            </div>
            <table id="user_data" class="table table-bordered table-striped" width="100%">  
             <thead>  
              <tr>  
               <th width="10%">ID</th>  
               <th>Name</th>  
               <th>Time In</th> 
              </tr>   
              
             </thead>
             <tbody>
               <?php foreach ($staffs as $staff): ?>
                <tr>
                  <td><?php echo $staff['id']; ?></td>
                  <td><?php echo $staff['name']; ?></td>
                  <td><?php echo date('h:ia ', strtotime($staff['timein'])); ?></td>
                  
                </tr>                  
               <?php endforeach; ?>
             </tbody> 
            </table>
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