        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
          <li><a href="<?php echo $this->webroot; ?>"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="<?php echo $this->webroot; ?>/rail_competency/courses"><i class="fa fa-book"></i> Course Outlines</a></li>
        </ul>
        <div class="m-b-md">
          <h3 class="m-b-none">Report: Code Not Found in database</h3>
        </div>
        <!-- start content view page -->
        
        <section class="vbox">
            <section class="hbox stretch">

              <!-- start column 2 -->
              <aside class="bg-white">
                <section class="vbox">
                  

                  <?php if (!empty($report)) : ?>
                    <section class="panel panel-default padder">
                     <div class="table-responsive">
                      <table class="table table-striped b-t b-light">
                        <thead>
                          <tr>
                            <th>
                                #
                            </th>
                            <th>
                              Code
                            </th>
                            
                          </tr>
                        </thead>

                        <tbody>
                            <?php $count = 1; ?>
                         <?php 
                            foreach ($report as $item) : 
                                if (!empty($item)) {
                            ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $item; ?></td>
                            </tr>
                            <?php }
                            $count ++; ?>
                        <?php endforeach; ?>
                        <tr>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                <?php endif; ?>

                
         
 
</section>
</aside>
</section>
</section>

