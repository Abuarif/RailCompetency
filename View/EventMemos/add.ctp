

<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('EventMemo', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Special Notes for Memo'); ?></h4>
    </div>
    <div class="modal-body">
				<?php
	//$notes = '';

    // if (!empty($this->request->data['EventMemo']['memo'])) {
    //   $notes = $this->request->data['EventMemo']['memo'];
    // } else if (!empty(Configure::read('RCMS.special_notes_for_memo'))) {
      $notes = Configure::read('RCMS.special_notes_for_memo');
    // }

    // echo $this->Form->input('id', array('class' => 'col-lg-2 control-label form-control'));
    // echo $this->Form->input('event_id', array('class' => 'col-lg-2 control-label form-control'));
    // echo $this->Form->input('signed_by', array('class' => 'col-lg-2 control-label form-control'));
    echo $this->Form->input('memo', array('class' => 'form-control', 'label' => false));
  ?>
  <br/>
  &nbsp; <b>Example: </b> <br/>&nbsp;&nbsp;<?php echo $notes; ?>
  <?php
    echo $this->Form->hidden('external', array('class' => 'form-control', 'value' => $external));
  	echo $this->Form->hidden('event_id', array('class' => 'form-control', 'value' => $event_id));
		// echo $this->Form->input('memo', array('class' => 'form-control', 'placeholder' => 'Place your comment to the approver here...'));
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


