
<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Course', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Course Batch Data Upload'); ?></h4>
    </div>
    <div class="modal-body">
      <p> Sample CSV file: <BR>
        1,Rail Academy DepartmentÊ,General Course & Common CoreÊ,Kelana Jaya Line Systems and Subsystems Common Core Training,CODE001,Test Course Name 001,10,0,0,This is a sample course details.,3,0,0<br/>
2,Bombardier (BHC),Rolling Stock,Kelana Jaya Line Systems and Subsystems Common Core Training,CODE002,Test Course Name 002,20,0,0,This is a sample course details.,5,0,1</p>
				<?php
		echo $this->Form->input('files', array('type' => 'file', 'class' => 'form-control'));
	?>
	</div>
    <div class="modal-footer">
    	<?php echo $this->Layout->sessionFlash(); ?>
    	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
    	<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary'));?>
    </div>
    	<?php echo $this->Form->end();?>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
