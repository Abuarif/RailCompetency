<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Course', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header" style="text-align:center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Edit Course'); ?></h4>
    </div>
    <div class="modal-body">
		<?php
			echo $this->Form->input('id', array('class' => 'form-control'));
			echo $this->Form->input('training_provider_id', array('class' => 'form-control', 'style' => 'width:560px;'));
			echo '<br><br>';
			echo $this->Form->input('module_id', array('class' => 'form-control', 'style' => 'width:560px;'));
			echo '<br><br>';
			echo $this->Form->input('service_id', array('class' => 'form-control', 'style' => 'width:560px;'));
			echo '<br><br>';
			echo $this->Form->input('pax', array('class' => 'form-control', 'type' => 'textbox', 'label' => 'Pax (0 - Unlimited)'));
			echo '<br>';
			echo $this->Form->input('cost_pax', array('class' => 'form-control', 'type' => 'textbox', 'label' => 'Cost Per Pax (RM)'));
			echo '<br>';
			echo $this->Form->input('total_cost', array('class' => 'form-control', 'type' => 'textbox', 'label' => 'Total Cost (RM)'));
			echo '<br>';
			echo $this->Form->input('code', array('class' => 'form-control'));
			echo '<br>';
			echo $this->Form->input('old_code', array('class' => 'form-control'));
			echo '<br>';
			echo $this->Form->input('name', array('class' => 'form-control'));
			echo '<br>';
			echo $this->Form->input('details', array('class' => 'form-control', 'style' => 'resize:none;'));
			echo '<br>';
			echo $this->Form->input('duration', array('class' => 'form-control', 'type' => 'textbox'));
			echo '<br>';
			echo $this->Form->input('cycleTime', array('class' => 'form-control', 'type' => 'textbox'));
			echo '<br>';
		?>
		<div class="row">
	 		<div class="col-lg-3">
	        	<?php
		          echo $this->Form->input('isRefresher');
		        ?>
			</div>
			<div class="col-lg-3">
	        	<?php
		          echo $this->Form->input('hasPTE');
		        ?>
			</div>
			<div class="col-lg-3">
	        	<?php
		          echo $this->Form->input('external');
		        ?>
			</div>
			<div class="col-lg-3">
	        	<?php
		          echo $this->Form->input('active');
		        ?>
			</div>				       
	    </div>
	</div>
    <div class="modal-footer">
    	<?php echo $this->Layout->sessionFlash(); ?>
    	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
    	<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary'));?>
    </div>
    	<?php echo $this->Form->end();?>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->


