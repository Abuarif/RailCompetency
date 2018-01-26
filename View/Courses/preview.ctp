<div class="modal-dialog">
	<div class="modal-content">
    	<div class="modal-header">
      		<button type="button" class="close" data-dismiss="modal">&times;</button>
      		<h4 class="modal-title">Course Preview</h4>
    	</div>
    	<div class="modal-body">
     		<small class="text-uc text-xs text-muted"><?php echo __('Training Provider'); ?></small>
			<p>
				<?php echo $this->Html->link($course['TrainingProvider']['name'], array('controller' => 'training_providers', 'action' => 'view', $course['TrainingProvider']['id'])); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Module'); ?></small>
			<p>
				<?php echo $this->Html->link($course['Module']['name'], array('controller' => 'modules', 'action' => 'view', $course['Module']['id'])); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Service'); ?></small>
			<p>
				<?php echo $this->Html->link($course['Service']['name'], array('controller' => 'services', 'action' => 'view', $course['Service']['id'])); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Code'); ?></small>
			<p>
				<?php echo h($course['Course']['code']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Name'); ?></small>
			<p>
				<?php echo h($course['Course']['name']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Files'); ?></small>
			<p>
				<?php echo h($course['Course']['files']); ?>
				&nbsp;
				<?php if (!empty($course['Course']['files'])) {

	        echo $this->Html->link('Download', '/attachments/'.$course['Course']['files'], array('target' => '_blank')); 

	        } else {
	          echo "Not available!";
	        }


	        ?>
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Details'); ?></small>
			<p>
				<?php echo h($course['Course']['details']); ?>
				&nbsp;
			</p>
			<small class="text-uc text-xs text-muted"><?php echo __('Duration'); ?></small>
			<p>
				<?php echo h($course['Course']['duration']); ?>
				&nbsp;
			</p>
			     
        </div>
	    <div class="modal-footer">
	    	<?php echo $this->Layout->sessionFlash(); ?>
	    	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
	    </div>
	</div>
</div>