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
  <li class="active"><?php echo __('Event'); ?> Calendar</li>
</ul>
<!-- <div class="m-b-md">
  <h3 class="m-b-none">Event Management & Calendar</h3>
</div> -->
<!-- start content view page -->
<section class="vbox">

  <!-- <section class="scrollable"> -->
    <section class="hbox stretch">          
      <!-- .aside -->
      <aside>
        <section class="vbox">
          <!-- <section class="scrollable"> -->
            <section class="wrapper">
              <section class="panel panel-default">
                <header class="panel-heading bg-light clearfix">
                  <div class="row wrapper">
                     <div class="col-sm-4 m-b-xs btn-group">
                      <?php //echo $this->Form->create('Event', array('action' => 'calendar', 'class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
                      <?php //echo $this->Form->input('Event.service_id', array('options' => $services, 'class' => 'form-control input-s-sm inline v-middle', 'empty' => '(choose one)')); ?>
                      <?php //echo $this->Form->button('Filter', array('class' => 'btn btn-sm btn-default'));?>
                      <?php echo $this->Form->button('Close', array('class' => 'btn btn-sm btn-danger closeBtn'));?>
                      <?php echo $this->Form->button('Print', array('class' => 'btn btn-sm btn-success printBtn'));?>
                      <?php //echo $this->Form->end(); ?>
                    </div>
                    <div class="col-sm-4 m-b-xs">
                      <?php echo $services[$service_id];?>
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
              <div class="calendar" id="calendar">

              </div>
            </section>
          </section>
        <!-- </section> -->
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
                <button class="btn btn-info"><a id="editUrl"><span style="color:white;"><i class="fa fa-gears"></i>&nbsp;&nbsp;Manage Event</span></a></button>
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
      '../theme/LamanPuteri/js/fullcalendar/event_setup.js',
      '../theme/LamanPuteri/js/fullcalendar/bootstrapmodal.min.js',
  ));
?>
