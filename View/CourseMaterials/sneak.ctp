<div class="modal-dialog">
  <div class="modal-content">
    <?php echo $this->Form->create('Course', array('type' => 'file', 'class' => 'bs-example form-horizontal')); ?>
    <div class="modal-header" style="text-align:center;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><?php echo __('Sneak Preview'); ?></h4>
    </div>
    <div class="modal-body">
      <i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Course'); ?></span>
      <br>
      <span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo $this->Html->link($courseMaterial['Course']['name'], array('controller' => 'courses', 'action' => 'view', $courseMaterial['Course']['id'])); ?></span>

      <br><br>

      <i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Course Material Type'); ?></span>
      <br>
      <span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo $this->Html->link($courseMaterial['CourseMaterialType']['name'], array('controller' => 'course_material_types', 'action' => 'view', $courseMaterial['CourseMaterialType']['id'])); ?></span>
      
      <br><br>

      <i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Course Material Permission'); ?></span>
      <br>
      <span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo $this->Html->link($courseMaterial['CourseMaterialPermission']['name'], array('controller' => 'course_material_permissions', 'action' => 'view', $courseMaterial['CourseMaterialPermission']['id'])); ?></span>
      
      <br><br>

      <i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Name'); ?></span>
      <br>
      <span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo h($courseMaterial['CourseMaterial']['name']); ?></span>
      
      <br><br>

      <i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Description'); ?></span>
      <br>
      <span style="padding-left:12px;padding-top:5px;font-weight:bold;"><?php echo h($courseMaterial['CourseMaterial']['description']); ?></span>
      
      <br><br>

      <i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Files'); ?></span>
      <br>
      <span style="padding-left:12px;padding-top:5px;font-weight:bold;">
        <?php 
          echo $this->Html->link(__('Download'), "/attachments/".$courseMaterial['CourseMaterial']['files'], array('style' => 'color:green;', 'target' => '_blank', 'escape'=>false));
        ?>
      </span>
      
      <br><br>

      <i class="fa fa-caret-right"></i>&nbsp;&nbsp;<span style="font-size:14px;"><?php echo __('Active'); ?></span>
      <br>
      <span style="padding-left:12px;padding-top:5px;font-weight:bold;">
        <?php 
          if($courseMaterial['CourseMaterial']['active'] == 1)
          {
            echo 'Active';
          }else{
            echo 'Not Active';
          }
        ?>
      </span>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
  </div>
</div>
