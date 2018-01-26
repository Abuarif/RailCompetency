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

<script type="text/javascript">

  setInterval(function() {
    this.state = this.state ? false : true;
    this.list = document.getElementsByTagName('blink')
    for (var i = this.list.length - 1; i >= 0; i --) {
        this.list[i].style.color = this.state ? 'transparent' : 'inherit';
    }
  }, 1000);

</script>

<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
  <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
  <li class="active">Calendar Archieve</li>
</ul>
<!-- <div class="m-b-md">
  <h3 class="m-b-none">Event Management & Calendar</h3>
</div> -->
<!-- start content view page -->
<section class="vbox" style="position: fixed; width: 95%;">

  <!-- <section class="scrollable"> -->
    <section class="hbox stretch">          
      <!-- .aside -->
      <aside>
        <section class="vbox">
          <section class="scrollable">
            <section class="scrollable wrapper">
              <section class="panel panel-default">
                <header class="panel-heading bg-light clearfix">
                  <div class="row wrapper">
                    <div class="col-sm-6 m-b-xs btn-group">
                      <?php echo $this->Form->create('Event', array('action' => 'calendar_archieve', 'class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
                      <?php echo $this->Form->input('Event.service_id', array('options' => $services, 'class' => 'form-control input-s-sm inline v-middle', 'empty' => '(choose one)')); ?>
                      <?php echo $this->Form->button('Filter', array('class' => 'btn btn-sm btn-default'));?>
                      <?php echo $this->Form->button('Print Preview', array('class' => 'btn btn-sm btn-default windowBtn'));?>
                      <?php echo $this->Form->end(); ?>
                      <!-- <button class="windowBtn hidden-print">Print Preview</button> -->

                    </div>
                    <div class="col-sm-4 m-b-xs">
                      <div class="btn-group pull-right" data-toggle="buttons">
                        <label class="btn btn-sm btn-bg btn-default" id="refresh" onclick ='location.reload();'>
                          <input type="radio" name="options"><i class="fa fa-refresh"></i>
                        </label>
                        <label class="btn btn-sm btn-bg btn-default active" id="monthview">
                          <input type="radio" name="options">Month
                        </label>
                        <label class="btn btn-sm btn-bg btn-default" id="weekview">
                          <input type="radio" name="options">Week
                        </label>
                        <label class="btn btn-sm btn-bg btn-default" id="dayview">
                          <input type="radio" name="options">Day
                        </label>
                      </div>
                    </div>
                  </div>
                </header>
              <div id="loader" style="text-align:center;padding-top:50px;padding-bottom:50px;">Loading...</div>
              <div class="calendar" id="calendar">

              </div>
            </section>
          </section>
        </section>
      </aside>
      
    </section>
  <!-- </section> -->
</section>

<input type='hidden' name='server' id='server' value='<?php echo $this->webroot; ?>'>
<input type='hidden' name='service_id' id='service_id' value='<?php echo $service_id; ?>'>
<!-- <input type='hidden' name='server' id='server' value='http://localhost]<?php echo $this->webroot; ?>'> -->
<input type='hidden' name='start_time' id='start_time' value='<?php echo Configure::read('RCMS.start_time'); ?>'>
<input type='hidden' name='end_time' id='end_time' value='<?php echo Configure::read('RCMS.end_time'); ?>'>

<div id="editEventModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
                <h4 id="venue" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body">
              <div class="row">
                <div class="col-sm-6 portlet">
                  <section class="panel panel-default portlet-item">
                    <header class="panel-heading"> 
                      Start Date
                    </header>
                    <div class="panel-body text-center">
                      <h4 id="startDate"></h4>
                      <span style="font-size:60px;"><i class="fa fa-calendar text-warning"></i></span>
                    </div>
                  </section>
                </div>
                <div class="col-sm-6 portlet">
                  <section class="panel panel-default portlet-item">
                    <header class="panel-heading">
                      End Date
                    </header>
                    <div class="panel-body text-center">
                      <h4 id="endDate"></h4>
                      <span style="font-size:60px;"><i class="fa fa-calendar-o text-info"></i></span>
                    </div>
                  </section>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 portlet">
                  <section class="panel panel-default portlet-item">
                    <header class="panel-heading">
                      Participants
                    </header>
                    <div class="panel-body text-center">
                      <h4>
                        <div class="row">
                          <span id="attendees"></span>:<span id="pax"></span>
                        </div>
                      </h4>
                      <span style="font-size:60px;"><i class="fa fa-users text-dark"></i></span>
                    </div>
                  </section>
                </div>
                <div class="col-sm-6 portlet">
                  <section class="panel panel-default portlet-item">
                    <header class="panel-heading"> 
                      Trainers
                    </header>
                    <div class="panel-body text-center">
                      <h4 id="lead_trainer"></h4>
                      <span style="font-size:60px;"><i class="fa fa-user text-success"></i></span>
                    </div>
                  </section>
                </div>

              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-info"><a id="sneakUrl" data-toggle='ajaxModal'><span style="color:white;"><i class="fa fa-book"></i>&nbsp;&nbsp;Preview Course</span></a></button>
                <button class="btn btn-info"><a id="enrollUrl"><span style="color:white;"><i class="fa fa-users"></i>&nbsp;&nbsp;Manage Attendance</span></a></button>
                <button class="btn btn-info"><a id="editUrl"><span style="color:white;"><i class="fa fa-gears"></i>&nbsp;&nbsp;Manage Event</span></a></button>
                <!-- <button class="btn btn-info"><a id="editUrl"><span style="color:white;"><i class="fa fa-gears"></i>&nbsp;&nbsp;Manage Event</span></a></button> -->
                <!-- <button class="btn btn-danger fa fa-trash"><a id="deleteUrl">Delete Event!</a></button> -->
            </div>
        </div>
    </div>
</div>  

<?php
  echo $this->Html->script(array(
      '../theme/LamanPuteri/js/jquery.min.js',
      '../theme/LamanPuteri/js/fuelux/fuelux.js',
      '../theme/LamanPuteri/js/fullcalendar/fullcalendar.min.js',
      '../theme/LamanPuteri/js/jquery-ui-1.10.3.custom.min.js',
      '../theme/LamanPuteri/js/fullcalendar/event_archieve.js',
      '../theme/LamanPuteri/js/fullcalendar/bootstrapmodal.min.js',
  ));
?>