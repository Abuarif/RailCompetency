<div class="modal-dialog">
	<div class="modal-content">
		<?php echo $this->Form->create('Course', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
		<div class="modal-header" style="text-align:center;">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title"><?php echo __('Sneak Preview'); ?></h4>
		</div>
		<div class="modal-body">
			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Training Provider'); ?></span>
			<br>
			<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo $this->Html->link($course['TrainingProvider']['name'], array('controller' => 'training_providers', 'action' => 'view', $course['TrainingProvider']['id'])); ?></span>

			<br><br>

			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Module'); ?></span>
			<br>
			<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo $this->Html->link($course['Module']['name'], array('controller' => 'modules', 'action' => 'view', $course['Module']['id'])); ?></span>

			<br><br>

			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Service'); ?></span>
			<br>
			<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo $this->Html->link($course['Service']['name'], array('controller' => 'services', 'action' => 'view', $course['Service']['id'])); ?></span>
			
			<br><br>

			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Course Code'); ?></span>
			<br>
			<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo h($course['Course']['code']); ?></span>
			
			<br><br>



			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Course Name'); ?></span>
			<br>
			<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo h($course['Course']['name']); ?></span>
			
			<br><br>

			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Files'); ?></span>
			<br>
			<span style="padding-left:12px;padding-top:5px;font-weight:bold;">
				<?php 
					if (!empty($course['Course']['files'])) {
						echo $this->Html->link('Download', '/attachments/'.$course['Course']['files'], array('target' => '_blank')); 
					}else{
						echo "Not available!";
					}
				?>
			</span>

			<br><br>

			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Details'); ?></span>
			<br>
			<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo h($course['Course']['details']); ?></span>

			<br><br>

			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:114px6px;"><?php echo __('Duration'); ?></span>
			<br>
			<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo h($course['Course']['duration']); ?> Hours</span>

			<br><br>

			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Refresher'); ?></span>
			<br>
			<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo h($course['Course']['isRefresher']); ?></span>

			<br><br>

			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('CycleTime'); ?></span>
			<br>
			<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo h($course['Course']['cycleTime']); ?></span>
			
			<br><br>

			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Active'); ?></span>
			<br>
			<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo h($course['Course']['active']); ?></span>
				<!-- <div class="line"></div> -->
			<!-- </section> -->
		</div><!-- /.modal-content -->
		<div class="modal-footer">
			<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
		</div>
	</div><!-- /.modal-dialog -->
