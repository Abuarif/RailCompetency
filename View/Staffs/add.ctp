<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Staff', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header" style="text-align: center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Add Staff'); ?></h4>
    </div>
    <div class="modal-body">
		<?php
			echo $this->Form->input('organization_id', array('class' => 'form-control', 'style' => 'width:560px;', 'label' => 'Department/Unit'));
			//echo '<br><br>';
			?>
			<!-- <div id="keyword-StaffParentId"
			        <div class="form-group">
			            
      		<input type='text' name='data[Staff][[parent_id]' id='StaffParentId'>

			      </div>
			      <div class="line line-dashed line-lg pull-in"></div>
			        </div> -->
			<?php
			//echo $this->Form->input('parent_id', array('class' => 'form-control', 'style' => 'width:560px;', 'label' => 'Manager/Supervisor'));
			echo '<br><br>';
			// echo $this->Form->input('user_id', array('class' => 'form-control', 'style' => 'width:560px;'));
		 // 	echo '<br><br>';
			echo $this->Form->input('staff_no', array('class' => 'form-control', 'type' => 'text', 'style' => 'width:560px;'));
			echo '<br>';
			echo $this->Form->input('position_id', array('class' => ' form-control', 'style' => 'width:560px;'));
			echo '<br><br>';
			echo $this->Form->input('name', array('class' => 'form-control', 'style' => 'width:560px;'));
			echo '<br>';
			echo $this->Form->input('email', array('class' => 'form-control', 'style' => 'width:560px;'));
			echo '<br>';
			echo $this->Form->input('parent_code', array('class' => 'form-control'));
			echo '<br>';
			echo $this->Form->input('org_code', array('class' => ' form-control'));
			echo '<br>';
			echo $this->Form->input('NRIC', array('class' => 'form-control'));
			echo '<br>';
			// echo $this->Form->input('details', array('class' => 'form-control', 'style' => 'resize:none;'));
			// echo '<br>';
			// echo $this->Form->input('lft', array('class' => 'el form-control', 'type' => 'text'));
			// echo '<br>';
			// echo $this->Form->input('rght', array('class' => 'form-control', 'type' => 'text'));
			// echo '<br>';
		?>
      <!-- <input type='hidden' name='Staff.server' id='server' value='<?php echo $this->webroot; ?>'> -->
		<div class="row">
	 		<div class="col-lg-6">
	        	<?php
		          echo $this->Form->input('isTrainer');
		        ?>
			</div>
			<div class="col-lg-6">
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



<?php
echo $this->Html->script(array(
            '../theme/LamanPuteri/js/typeahead/staffs_typeahead.js',
            '../theme/LamanPuteri/js/keyword_search.js',
        ));
?>

