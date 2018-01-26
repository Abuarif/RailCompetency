<!-- <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.print.css " rel="stylesheet" type="text/css" media="print" /> -->

<button class="windowBtn hidden-print">Open Window</button>
<button class="printBtn hidden-print">Print</button>



           <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Training Rooms</li>
          </ul>
          <!-- <div class="m-b-md">
            <h3 class="m-b-none">Upcoming Calendar</h3>
          </div>
           --><!-- start content view page -->
          <section class="vbox">
            <!-- <section class="scrollable"> -->
              <section class="hbox stretch">          
            <!-- .aside -->
            <aside>
              <section class="vbox">
                <section class="wrapper">
                  <section class="panel panel-default">
                    <!-- <header class="panel-heading bg-light clearfix">
                      <div class="row wrapper">
                        <div class="col-sm-4 m-b-xs">
                          <span class="m-t-xs inline">
                            Training Rooms 
                          </span>
                        </div>
                        <div class="col-sm-4 m-b-xs">
                          <?php echo $this->Form->create('Event', array('action' => 'training_rooms', 'class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
                          <?php echo $this->Form->input('Event.venue_id', array('options' => $venues, 'class' => 'form-control input-s-sm inline v-middle')); ?>
                          <?php echo $this->Form->button('Find', array('class' => 'btn btn-sm btn-default'));?>
                          <?php echo $this->Form->end(); ?>
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
                    </header> -->
                    <div class="calendar" id="calendar">

                    </div>
                  </section>
                </section>
              </section>
            </aside>
          <!-- </section> -->
        </section>
      </section>

      <input type='hidden' name='server' id='server' value='<?php echo 'http://'.$_SERVER['SERVER_NAME'].Router::url('/') ?>'>
      <input type='hidden' name='venue_id' id='venue_id' value='<?php echo $venue_id; ?>'>

      <div id="previewEventModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
              <h4 id="modalTitle" class="modal-title"></h4><br/>
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
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button class="btn btn-info"><a id="sneakUrl" data-toggle='ajaxModal'><span style="color:white;"><i class="fa fa-book"></i>&nbsp;&nbsp;Preview Course</span></a></button>
              <button class="btn btn-info"><a id="editUrl"><span style="color:white;"><i class="fa fa-gears"></i>&nbsp;&nbsp;Manage Event</span></a></button>
              <!-- <button class="btn btn-info"><a id="enrollUrl"><span style="color:white;"><i class="fa fa-users"></i>&nbsp;&nbsp;Manage Participant</span></a></button> -->
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
      '../theme/LamanPuteri/js/fullcalendar/event_training_rooms.js',
      '../theme/LamanPuteri/js/fullcalendar/bootstrapmodal.min.js',
      // '../theme/LamanPuteri/js/typeahead/bootstrap3-typeahead.js',
      // '../theme/LamanPuteri/js/typeahead/cbunny.js',
      // '../theme/LamanPuteri/js/select2/select2.min.js',
      // '../theme/LamanPuteri/js/typeahead/event_enrollment_typeahead.js',
  ));
?>