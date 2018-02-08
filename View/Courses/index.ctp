 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
  <li><a href="<?php echo $this->webroot; ?>"><i class="fa fa-home"></i>&nbsp;Home</a></li>
  <li class="active"><a href="" onClick="location.reload();"><?php echo __('Course'); ?> Outlines</a></li>
</ul>

<?php echo $this->Layout->sessionFlash(); ?>

<div class="m-b-md">
  <h3 class="m-b-none"><?php echo __('Course'); ?> Outlines</h3>
</div>

<section class="panel panel-default">
<div class="row wrapper">
  <div class="col-sm-9 m-b-xs">
    <div class="btn-group">
      <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
    </div>
    <?php echo $this->Html->link(' Create New Course', array('action' => 'add'), array('class' => 'btn btn-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
    <?php echo $this->Html->link(' Upload New Course', array('action' => 'import'), array('class' => 'btn btn-success fa fa-upload', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
    <?php echo $this->Html->link(' Existing Course Codes (.csv)', array('action' => 'export'), array('class' => 'btn btn-warning fa fa-download', 'escape' => false)); ?>
    <?php echo $this->Html->link(' Upload New Course Code', array('action' => 'import_new_code'), array('class' => 'btn btn-danger fa fa-upload', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
  </div>
  <div class="col-sm-3">
    <?php echo $this->Form->create('Course', array('class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
    <div class="input-group">
      <?php
        echo $this->Form->input('queryString', array('class' => 'input-sm form-control', 'placeholder' => 'Search')); 
      ?>
     <span class='input-group-btn'>
      <?php echo $this->Form->button('Go!', array('class' => 'btn btn-sm bg-success'));?>
    </span>
  </div>
  <?php echo $this->Form->end();?>
</div>
</div>
</div>
<div class="table-responsive">
<table class="table table-striped b-t b-light">
  <thead>
    <tr>
      <th class="text-center sorting" style="width:150px;"><?php echo __('Actions'); ?></th>
      <th><?php echo $this->Paginator->sort('training_provider_id'); ?></th>
      <th class="text-center sorting"><?php echo $this->Paginator->sort('new code'); ?></th>
      <th class="text-center sorting"><?php echo $this->Paginator->sort('old code'); ?></th>
      <th><?php echo $this->Paginator->sort('course name'); ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($courses as $course): ?>
    <tr>
      <td class="text-center sorting">
       
       <?php echo $this->Html->link($this->Form->button('<i class="fa fa-desktop"></i>', array('class'=>'btn btn-xs btn-info', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details')), array('action' => 'view', $course['Course']['id']), array('escape' => false)); ?>
       <?php echo $this->Html->link($this->Form->button('<i class="fa fa-eye"></i>', array('class'=>'btn btn-xs btn-primary', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Sneak Preview')), array('action' => 'sneak', $course['Course']['id']), array('data-toggle'=>'ajaxModal','escape' => false)); ?>
       <?php echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $course['Course']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false)); ?>
      </td>
      <td>
        <?php echo $this->Html->link($course['TrainingProvider']['name'], array('controller' => 'training_providers', 'action' => 'view', $course['TrainingProvider']['id'])); ?>
      </td>
      <td class="text-center sorting"><?php echo h($course['Course']['code']); ?>&nbsp;</td>
      <td class="text-center sorting"><?php echo h($course['Course']['old_code']); ?>&nbsp;</td>
      <td><?php echo h($course['Course']['name']); ?>&nbsp;</td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
  <footer class="panel-footer">
    <div class="row">
      <div class="col-lg-6">
        <?php
          echo $this->Paginator->counter(array(
            'format' => __('Showing {:start} to {:end} of {:count} entries')
            ));
        ?>                   
      </div>
      <div class="col-lg-6" style="text-align:right;">                
        <ul class="pagination pagination-sm m-t-none m-b-none">
          <?php
          echo '<li>'.$this->Paginator->first('First', array(), null, array('class' => 'prev disabled')).'</li>';
          echo '<li>'.$this->Paginator->prev('Previous', array(), null, array('class' => 'prev disabled')).'</li>';
          echo '<li>'.$this->Paginator->numbers(array('separator' => '</li>
            <li>')).'</li>';
          echo '<li>'.$this->Paginator->next('Next', array(), null, array('class' => 'next disabled')).'</li>';
          echo '<li>'.$this->Paginator->last('Last', array(), null, array('class' => 'next disabled')).'</li>';
          ?>
        </ul>
      </div>
    </div>
  </footer>
</section>

