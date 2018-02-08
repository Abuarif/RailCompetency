

<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Staff', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header" style="text-align: center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Edit Staff'); ?></h4>
    </div>
    <div class="modal-body">
			<?php
				echo $this->Form->input('id', array('class' => 'form-control'));
				echo $this->Form->input('name', array('class' => 'form-control', 'readonly' => 'readonly'));
				echo '<br>';		
				echo $this->Form->input('NRIC', array('class' => 'form-control'));
				echo '<br>';				
				echo $this->Form->input('race', array('class' => 'form-control', 'options' => $races, 'empty' => 'Select Race'));
				echo '<br>';
			?>
		</div>
    <div class="modal-footer">
    	<?php echo $this->Layout->sessionFlash(); ?>
    	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
    	<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary')); ?>
    </div>
    	<?php echo $this->Form->end(); ?>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->


