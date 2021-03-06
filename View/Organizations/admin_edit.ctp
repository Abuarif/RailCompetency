

<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Organization', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Admin Edit Organization'); ?></h4>
    </div>
    <div class="modal-body">
				<?php
		echo $this->Form->input('id', array('class' => 'form-control'));
		echo $this->Form->input('parent_id', array('class' => 'form-control'));
		echo $this->Form->input('parent_code', array('class' => 'form-control'));
		echo $this->Form->input('org_code', array('class' => 'form-control'));
		echo $this->Form->input('name', array('class' => 'form-control'));
		echo $this->Form->input('details', array('class' => 'form-control'));
		echo $this->Form->input('lft', array('class' => 'form-control'));
		echo $this->Form->input('rght', array('class' => 'form-control'));
		echo $this->Form->input('active', array('class' => 'form-control'));
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


