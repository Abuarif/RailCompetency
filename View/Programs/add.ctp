
<div class="modal-dialog">
  <div class="modal-content">
  	<?php echo $this->Form->create('Program', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header" style="text-align:center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Add Program'); ?></h4>
    </div>
    <div class="modal-body">
      <?php
        echo $this->Form->input('name', array('class' => 'form-control'));
      ?>
      <label>
        <?php
          echo $this->Form->input('active');
        ?>
      </label>
    </div>
    <div class="modal-footer">
    	<?php echo $this->Layout->sessionFlash(); ?>
    	<a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
    	<?php echo $this->Form->button('Submit', array('class' => 'btn btn-primary'));?>
    </div>
    <?php echo $this->Form->end();?>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->


