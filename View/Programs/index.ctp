<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
  <li><a href="<?php echo $this->webroot; ?>"><i class="fa fa-home"></i>&nbsp;Home</a></li>
  <li class="active"><?php echo __('Program'); ?> List</li>
</ul>

<?php echo $this->Layout->sessionFlash(); ?>

<div class="m-b-md">
  <h3 class="m-b-none"><?php echo __('Program'); ?> List</h3>
</div>

<section class="panel panel-default">
  <div class="row wrapper">
    <div class="col-sm-5 m-b-xs">
      <div class="btn-group">
        <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh" class="btn btn-sm btn-default" title="Refresh" onclick ='location.reload();'><i class="fa fa-refresh"></i>&nbsp;&nbsp;Refresh</button>
      </div>
      <?php echo $this->Html->link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create', array('action' => 'add'), array('class' => 'btn btn-success btn-sm', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
    </div>
    <div class="col-sm-4 m-b-xs">
      &nbsp;
    </div>
    <div class="col-sm-3">
      <?php echo $this->Form->create('Program', array('class' => 'bs-example form-horizontal', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
      <div class="input-group">
       <?php
       echo $this->Form->input('queryString', array('class' => 'input-sm form-control', 'placeholder' => 'Search')); ?>
       <span class='input-group-btn'>
        <?php echo $this->Form->button('Go!', array('class' => 'btn btn-sm bg-success'));?>
      </span>
    </div><?php echo $this->Form->end();?>
  </div>
</div>
</div>
<div class="table-responsive">
  <table class="table table-striped b-t b-light">
    <thead>
      <tr>
        <th class="text-center sorting" style="width:150px;"><?php echo __('Actions'); ?></th>
        <th><?php echo $this->Paginator->sort('Program Name'); ?></th>
        <th class="text-center sorting" style="width:100px;"><?php echo $this->Paginator->sort('Status'); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($programs as $program): ?>
        <tr>
          <td class="text-center sorting">
            <?php 
              //echo $this->Html->link($this->Form->button('<i class="fa fa-calendar"></i>', array('class'=>'btn btn-xs btn-danger', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Calendar')), array('action' => 'calendar', $program['Program']['id']), array('escape' => false)); 
            ?>
            <?php 
              echo $this->Html->link($this->Form->button('<i class="fa fa-desktop"></i>', array('class'=>'btn btn-xs btn-success', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details')), array('action' => 'view', $program['Program']['id']), array('escape' => false)); 
            ?>
            <?php 
              echo $this->Html->link($this->Form->button('<i class="fa fa-pencil"></i>', array('class'=>'btn btn-xs btn-warning', 'style'=>'color:#000; width:25px; height:25px;','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details')), array('action' => 'edit', $program['Program']['id']), array('data-toggle'=>'ajaxModal', 'escape' => false));    
            ?>
        </td>
        <td>
          <?php echo h($program['Program']['name']); ?>&nbsp;</td>
          <?php if ($program['Program']['active'] == 1) { ?>
        <td class="text-center sorting">
          <div class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Program Active"><i class="fa fa-check bg-success"></i></div>
        </td>
          <?php } else { ?>
        <td class="text-center sorting">
          <div class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Program Not Active"><i class="fa fa-times bg-danger"></i></div>
        </td>
          <?php } ?>
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
      echo '<li>'.$this->Paginator->prev('Previous', array(), null, array('class' => 'prev disabled')).'</li>';
      echo '<li>'.$this->Paginator->numbers(array('separator' => '</li>
        <li>')).'</li>';
      echo '<li>'.$this->Paginator->next('Next', array(), null, array('class' => 'next disabled')).'</li>';
      ?>
    </ul>
  </div>
</div>
</footer>
</section>

