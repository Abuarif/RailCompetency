          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="<?php echo $this->webroot; ?>"<i class="fa fa-home"></i> Home</a></li>
            <li class="active"><a href="#" onClick="location.reload();"><?php echo __('Position'); ?>'s Details</a></li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Position'); ?>'s Details</h3>
          </div>
          <!-- start content view page -->
          <section class="vbox">
            <section class="scrollable">
              <section class="hbox stretch">
                <!-- start column 2 -->
                                <aside class="bg-white">
                  <section class="vbox">
                    <!-- tab content headers -->
                    <header class="header bg-light bg-gradient" style="height:auto">
                      <div>
                        <ul class="nav nav-tabs nav-white">
                        <!-- start tab link -->

                        <!-- <li class="active"><a href="#dashboard" data-toggle="tab">Dashboard</a></li> -->
                                                  <!-- end of hasOne -->
                          <!-- start hasMany -->
                                                      <li><a href="#Staffs" data-toggle="tab">Staffs</a></li>
                            
                          <!-- end hasMany -->
                        <!-- end tab link -->
                        </ul>
                      </div>
                    </header>
                    <!-- end tab content headers -->
                    <!-- tab content article-->
                    <article class="scrollable">
                      <!-- tab content div -->
                      <div class="tab-content">
                        <!-- start hasOne -->
                                                  <!-- end hasOne -->
                          <!-- start hasMany -->
                        <div class="tab-pane padder active" id="Staffs">
                            <h3><?php echo __('Related Staffs'); ?></h3>
                            

                            <?php if (!empty($position['Staff'])): ?>
                            <section class="panel panel-default padder">
                              <div class="row wrapper">
                                <div class="col-sm-5 m-b-xs">
                                    			<?php echo $this->Html->link(' Create', array('controller' => 'staffs', 'action' => 'add', '?' => array('returnURL' => $this->Html->url( null, true ))), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                                </div>
                              </div>
                              <div class="table-responsive">
                                <table class="table table-striped b-t b-light">
                                  <thead>
                                    <tr>
                                      <th class="actions"><?php echo __('Actions'); ?> </th>
                                      <th> <?php echo __('Staff No'); ?> </th>
                                      <th> <?php echo __('Name'); ?> </th>
                                      <th> <?php echo __('Email'); ?> </th>
                                    </thead>
                                  
                                  <tbody>
                                  	<?php foreach ($position['Staff'] as $staff): ?>
		<tr>
			<td class="actions">
				<?php echo $this->Html->link('', array('controller' => 'staffs', 'action' => 'sneak', $staff['id']), array('class'=>'btn btn-xs btn-success fa fa-desktop', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'View Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
				<?php echo $this->Html->link('', array('controller' => 'staffs', 'action' => 'edit', $staff['id']), array('class'=>'btn btn-xs btn-warning fa fa-pencil', 'style'=>'color:#000;width:25px; height:25px; padding-top:5px','data-toggle'=>'tooltip', 'data-placement'=>'right', 'title'=>'Modify Details', 'data-toggle'=>'ajaxModal', 'escape' => false)); ?>
			</td>
			<td><?php echo $staff['staff_no']; ?></td>
      <td><?php echo $staff['name']; ?></td>
			<td><?php echo $staff['email']; ?></td>
		</tr>
	<?php endforeach; ?>
                                    <tr>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            <?php endif; ?>

                            <br/>
                            <div class="actions">
                              <div class="col-sm-5 m-b-xs">
                                  			<?php echo $this->Html->link(' Create', array('controller' => 'staffs', 'action' => 'add', '?' => array('returnURL' => $this->Html->url( null, true ))), array('class' => 'btn btn-default bg-success fa fa-plus', 'data-toggle'=>'ajaxModal', 'style'=>'color:#000;', 'escape' => false)); ?>
 
                              </div>
                            </div>
                          </div>
                                                    <!-- end hasMany -->
                        <!-- end tab content -->
                      </div><!-- end tab content div -->
                    </article> <!-- end tab content article-->
                  </section>
                </aside>
                                <!-- end column 2 -->
              </section>
            </section>
          </section>
          <!-- end content view page -->

