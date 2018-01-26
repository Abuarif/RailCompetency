<link rel="stylesheet" type="text/css" href="/lms/css/../theme/LamanPuteri/js/datatables/datatables.css">

<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 20%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 }
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom {
  from{ bottom:-100px; opacity:0 }
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
</style>


<div id="loader" style="text-align:center;padding-top:10px;padding-bottom:10px;"></div>
<!-- <div id="loader2" style="text-align:center;padding-top:10px;"><img src="../../../theme/LamanPuteri/images/ajax-loader.gif" /><br/>Loading...</div> -->

<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Event', array('class' => 'form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Copy Participants: '.$event['Course']['code'].' ('.$this->Time->format('d-m-Y', $event['Event']['start_date']).')'); ?></h4>
    </div>
    <div class="modal-body">
			<section class="panel panel-default">
        <div class="table-responsive">
          <table id="datadisplay" class="table table-striped m-b-none">
            <thead>
              <tr>
                <th> Actions</th>
                <th> Event Details (Participants)</th>
                <th> Start Date</th>
                <th> End Date</th>
              </tr>
            </thead>
          </table>
        </div>
      </section>
    </div>
    <div class="modal-footer">
    	<?php echo $this->Layout->sessionFlash(); ?>
    	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
    </div>
    	<?php echo $this->Form->end();?>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->


<input type='hidden' name='server' id='server' value='<?php echo $this->webroot; ?>'>
<input type='hidden' name='service_id' id='service_id' value='<?php echo $service_id; ?>'>
<input type='hidden' name='event_id' id='event_id' value='<?php echo $event_id; ?>'>

<!-- <script type="text/javascript" src="/lms/js/../theme/LamanPuteri/js/jquery.min.js"></script> -->
<script type="text/javascript" src="/lms/js/../theme/LamanPuteri/js/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="/lms/js/../theme/LamanPuteri/js/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/lms/js/../theme/LamanPuteri/js/datatables/event_participants.js"></script>

// <?php
//   echo $this->Html->script(array(
//       '../theme/LamanPuteri/js/jquery.min.js',
//       // '../theme/LamanPuteri/js/datatables/custom.js',
//       '../theme/LamanPuteri/js/datatables/dataTables.bootstrap.js',
//       '../theme/LamanPuteri/js/datatables/jquery.dataTables.min.js',
//       '../theme/LamanPuteri/js/datatables/event_participants.js',
//   ));
// ?>