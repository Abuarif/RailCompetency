<?php

    $rcms = array(
        'APP_PATH' => Router::url('/',true)
    );
    echo $this->Html->scriptBlock('var server = ' . $this->Javascript->object($rcms) . ';');
?>

<div class="modal-dialog">
    <div class="modal-content">
        
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo __('Event Enrollment'); ?></h4>
            
        </div>
         <?php echo $this->Form->create('EventAttendance', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
        <div class="modal-body">
            <!-- <div class="pull-right">
                <input type="text" data-provide="typeahead" id="EventAttendanceStaffId">
            </div> -->
            <div>
                <?php
            		echo $this->Form->input('event_id', array('class' => 'col-lg-2 control-label form-control', 'value' => $event_id));
                    // echo $this->Form->input('staff_id', array('class' => 'col-lg-2 control-label form-control'));
            		echo $this->Form->input('staff_id', array('class' => 'col-lg-2 control-label form-control', 'id' => 'EventAttendanceStaffId', 'type' => 'text', 'data-provide' => 'typeahead'));
            		echo $this->Form->hidden('signed_by', array('class' => 'col-lg-2 control-label form-control', 'value' => $this->Session->read('Auth.user.id')));
            		echo $this->Form->hidden('isEnrolled', array('class' => 'col-lg-2 control-label form-control', 'value' => 1));
            		// echo $this->Form->input('isCompleted', array('class' => 'col-lg-2 control-label form-control'));
            		// echo $this->Form->input('notes', array('class' => 'col-lg-2 control-label form-control'));
            		echo $this->Form->hidden('active', array('class' => 'col-lg-2 control-label form-control', 'value' => 1));

                // echo $this->Form->input('event_id', array('class' => 'col-lg-2 control-label form-control'));
                // echo $this->Form->input('staff_id', array('class' => 'col-lg-2 control-label form-control', 'id' => 'EventAttendanceStaffId', 'type' => 'text', 'data-provide' => 'typeahead'));
                // // echo $this->Form->input('staff_id', array('class' => 'col-lg-2 control-label form-control'));
                // echo $this->Form->input('signed_by', array('class' => 'col-lg-2 control-label form-control'));
                // echo $this->Form->input('isEnrolled', array('class' => 'col-lg-2 control-label form-control'));
                // echo $this->Form->input('isCompleted', array('class' => 'col-lg-2 control-label form-control'));
                // echo $this->Form->input('notes', array('class' => 'col-lg-2 control-label form-control'));
                // echo $this->Form->input('active', array('class' => 'col-lg-2 control-label form-control'));
            ?>
                <!-- <input type='hidden' name='server' id='server' value='<?php echo $this->webroot; ?>'> -->
            </div>
        </div>
        <div class="modal-footer">
        	<?php echo $this->Layout->sessionFlash(); ?>
        	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
        	<?php echo $this->Form->button('Enroll Now', array('class' => 'btn btn-primary'));?>
        </div>
        <?php echo $this->Form->end();?>
        
    </div>
</div>  
<?php
  echo $this->Html->css(array(
      '../theme/LamanPuteri/js/typeahead/typeahead.css',
        ));
?>
<?php
  echo $this->Html->script(array(
      // '../theme/LamanPuteri/startbootstrap-creative/js/bootstrap.min.js',
      // '../theme/LamanPuteri/js/jquery.min.js',
      // '../theme/LamanPuteri/js/typeahead/bootstrap3-typeahead.js',
      '../theme/LamanPuteri/js/typeahead/typeahead.js',
      '../theme/LamanPuteri/js/typeahead/event_enrollment_typeahead.js',
      // '../theme/LamanPuteri/js/typeahead/cbunny.js',
      // '../theme/LamanPuteri/js/select2/select2.min.js',
  ));
?>