<div class="modal-dialog">
    <div class="modal-content">
        
        <div class="modal-header" style="text-align:center;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Preview Event</h4>
            
        </div>
        <div class="modal-body">
            <i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Course'); ?></span>
			<br>
      		<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo $this->Html->link($event['Course']['name'], array('controller' => 'courses', 'action' => 'view', $event['Course']['id'])); ?></span>
			
			<br><br>

			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Event Type'); ?></span>
			<br>
      		<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo $this->Html->link($event['Venue']['name'], array('controller' => 'venues', 'action' => 'view', $event['Venue']['id'])); ?></span>
			
			<br><br>
			
			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Pax'); ?></span>
			<br>
      		<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo h($event['Event']['pax']); ?></span>
			
			<br><br>

			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Details'); ?></span>
			<br>
      		<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo h($event['Event']['details']); ?></span>
			
			<br><br>

			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Start Date'); ?></span>
			<br>
      		<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo $this->Time->format('d-m-Y h:i A', $event['Event']['start_date']); ?></span>
			
			<br><br>

			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('End Date'); ?></span>
			<br>
      		<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo $this->Time->format('d-m-Y h:i A', $event['Event']['end_date']); ?></span>
			
			<br><br>

			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Last Enrollment'); ?></span>
			<br>
      		<span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo $this->Time->format('d-m-Y h:i A', $event['Event']['last_enrollment']); ?></span>
			
			<br><br>
			
			<i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Active'); ?></span>
			<br>
      		<span style="padding-left:12px;padding-top:5px;font-weight:bold;">
      		<?php if ($event['Event']['active'] == 1) { ?>
		<td>
            <div class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Event Active"><i class="fa fa-check bg-success"></i></div>  
  				&nbsp;
      	</td>
			<?php } else { ?>
						<td>
              <div class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Event Not Active"><i class="fa fa-times bg-danger"></i></div> 
		</td>
			<?php } ?>
			</span>
    </div>
    <div class="modal-footer">
    	<?php echo $this->Layout->sessionFlash(); ?>
    	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
    </div>
</div>  		