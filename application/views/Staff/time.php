<script>
function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("txt").innerHTML = hr + " : " + min + " " + ap;
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>

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
            <h1>Time In/Out</h1>
        </div>
        <div class="row">
          <div style="padding: 10px 10px;margin: 10px 10px;">
          <?php if($user['is_timein']=='no'): ?>
          <?php echo form_open('staff/timein'); ?>
          Time:
          <div id="txt"></div>
          <div class="form-group">
            <input type="hidden" class="form-control" name="uid" value="<?php echo $user['id']?>">
          </div>
          <button type="submit" class="btn btn-success">Log In</button>
          <?php elseif($user['is_timein']=='yes'): ?>
          <?php echo form_open('staff/timeout'); ?>
          Time:
          <div id="txt"></div>
          <div class="form-group">
            Note:
            <input type="text" name="note" class="form-control" style="width: 40%;">
            <input type="hidden" class="form-control" name="uid" value="<?php echo $user['id']?>">
            <input type="hidden" class="form-control" name="tid" value="<?php echo $time_id ?>">
          </div>
          <button type="submit" class="btn btn-success">Log Out</button>
          <?php endif; ?>
          <?php echo form_close(); ?>
        </div>
      </div>
      <div class="row">
          <div style="padding: 10px 10px;margin: 10px 10px;">
            <table class="table">
              <thead class="thead-light">
                <tr>
                <th scope="col" >Date</th>
                <th scope="col" >Time In</th>
                <th scope="col" >Time Out</th>
              </tr>
              </thead>
              <tbody>
                <?php foreach($timesheets as $time): ?>
              <tr>
                <td scope="row"><?php echo date("M-d-Y", strtotime($time->date)); ?></td>
                <td scope="row"><?php echo date('h:ia ', strtotime($time->time_in)); ?></td>
                <?php if ($time->time_out == NULL): ?>
                  <td scope="row"></td>
                <?php else: ?>
                  <td scope="row"><?php echo date('h:ia ', strtotime($time->time_out)); ?></td>
                <?php endif; ?>
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
</div>
<script type="text/javascript">
   window.onload = function() {
      startTime();
    };
</script>
<div class="clearfix"></div>
    <footer>
      <div class="container-fluid">
        <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
      </div>
    </footer>
  </div>
  <!-- END WRAPPER -->
  <!-- Javascript -->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/chartist/js/chartist.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/scripts/klorofil-common.js"></script>
</body>

</html>