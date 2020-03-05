<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
  <li><a href="<?php echo $this->webroot;?>dashboard"><i class="fa fa-home"></i> Home</a></li>
  <li class="active">Dashboard</li>
</ul>
<div class="m-b-md">
  <h3 class="m-b-none">Dashboard</h3>
  <!-- <small>Welcome back, Noteman</small> -->
</div>

<section class="panel panel-default">
  <div class="row m-l-none m-r-none bg-light lter">
    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x text-teal"></i>
        <i class="fa fa-calendar fa-stack-1x text-white"></i>
      </span>
      <a class="clear" href="#">
        <span class="h3 block m-t-xs"><strong><?php echo $myTotalEvent; ?></strong></span>
        <small class="text-muted text-uc">Events Configured</small>
      </a>
    </div>
    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x text-purple"></i>
        <i class="fa fa-calendar fa-stack-1x text-white"></i>
      </span>
      <a class="clear" href="rail_competency/events/">
        <span class="h3 block m-t-xs"><strong><?php echo $myPublishedEvent; ?></strong></span>
        <small class="text-muted text-uc">Events Published</small>
      </a>
    </div>
    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x text-maroon"></i>
        <i class="fa fa-calendar fa-stack-1x text-white"></i>
      </span>
      <a class="clear" href="rail_competency/events/index/1">
        <span class="h3 block m-t-xs"><strong><?php echo $myMemoEvent; ?></strong></span>
        <small class="text-muted text-uc">Memo Issued</small>
      </a>
    </div>
    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x text-success"></i>
        <i class="fa fa-calendar fa-stack-1x text-white"></i>
      </span>
      <a class="clear" href="rail_competency/events/archieve">
        <span class="h3 block m-t-xs"><strong><?php echo $myTCNEvent; ?></strong></span>
        <small class="text-muted text-uc">Events Completed</small>
      </a>
    </div>
  </div>
</section>
<section class="panel panel-default">
  <div class="row m-l-none m-r-none bg-light lter">
    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x text-warning"></i>
        <i class="fa fa-users fa-stack-1x text-white"></i>
      </span>
      <a class="clear" href="#">
        <span class="h3 block m-t-xs"><strong><?php echo $planned_participants.':'. $event_planned; ?></strong></span>
        <small class="text-muted text-uc">Nominations : Events</small>
      </a>
    </div>
    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x text-success"></i>
        <i class="fa fa-users fa-stack-1x text-white"></i>
      </span>
      <a class="clear" href="rail_competency/events/">
        <span class="h3 block m-t-xs"><strong><?php echo $completed_participants .':'.$completed_events; ?></strong></span>
        <small class="text-muted text-uc">Attendees : Events</small>
      </a>
    </div>
    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x text-danger"></i>
        <i class="fa fa-users fa-stack-1x text-white"></i>
      </span>
      <a class="clear" href="rail_competency/events/">
        <span class="h3 block m-t-xs"><strong><?php echo $absentees_participants.':'.$absentees_events; ?></strong></span>
        <small class="text-muted text-uc">Absentees : Events</small>
      </a>
    </div>
    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x text-purple"></i>
        <i class="fa fa-users fa-stack-1x text-white"></i>
      </span>
      <a class="clear" href="rail_competency/events/">
        <span class="h3 block m-t-xs"><strong><?php echo $student_evaluation.':'.$student_events; ?></strong></span>
        <small class="text-muted text-uc">Student Evaluations : Events</small>
      </a>
    </div>
  </div>
</section>
<section class="panel panel-default">
  <div class="row m-l-none m-r-none bg-light lter">
    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x text-teal"></i>
        <i class="fa fa-book   fa-stack-1x text-white"></i>
      </span>
      <a class="clear" href="#">
        <span class="h3 block m-t-xs"><strong><?php echo $latestEvents; ?></strong></span>
        <small class="text-muted text-uc">Events Configured This Week</small>
      </a>
    </div>
    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x text-maroon"></i>
        <i class="fa fa-book fa-stack-1x text-white"></i>
      </span>
      <a class="clear" href="rail_competency/events/">
        <span class="h3 block m-t-xs"><strong><?php echo $latestPublishedEvents; ?></strong></span>
        <small class="text-muted text-uc">Events Published This Week</small>
      </a>
    </div>
    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x text-info"></i>
        <i class="fa fa-book fa-stack-1x text-white"></i>
      </span>
      <a class="clear" href="rail_competency/events/">
        <span class="h3 block m-t-xs"><strong><?php echo $monthlyPublishedEvents; ?></strong></span>
        <small class="text-muted text-uc">Events Published This Month</small>
      </a>
    </div>
    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x text-danger"></i>
        <i class="fa fa-book fa-stack-1x text-white"></i>
      </span>
      <a class="clear" href="rail_competency/events/">
        <span class="h3 block m-t-xs"><strong><?php echo $dueTCNEvents; ?></strong></span>
        <small class="text-muted text-uc">Events Due TCN</small>
      </a>
    </div>
  </div>
</section>
<!-- <div class="row">
  <div class="col-lg-4">
      <section class="panel panel-default">
        <header class="panel-heading font-bold">Multiple</header>
        <div class="panel-body">
          <div id="flot-chart"  style="height:240px"></div>
        </div>                  
      </section>
  </div>
  <div class="col-lg-4">
    <section class="panel panel-default">
      <header class="panel-heading font-bold">Vertical bar</header>
      <div class="panel-body">
        <div id="flot-bar"  style="height:240px"></div>
      </div>                  
    </section>
  </div>
  <div class="col-lg-4">
    <section class="panel panel-default">
      <header class="panel-heading">
        Training Sessions
      </header>
      <?php 
        $planned_event = 0;
        (empty($event_status[0][0]['total'])?:$planned_event = $event_status[0][0]['total']);

        $completed_event = 0;
        (empty($event_status[1][0]['total'])?:$completed_event = $event_status[1][0]['total']);
      ?>
      <div class="panel-body text-center">
        <h4><?php echo $planned_event;?></h4>
        <small class="text-muted block">Planned Sessions</small>
        <div class="inline">
          <?php $training_completion = round($completed_event / $planned_event * 100, 2) ; ?>
          <div class="easypiechart" data-percent="<?php echo $training_completion; ?>" data-line-width="30" data-track-color="#eee" data-bar-color="#afcf6f" data-scale-color="#fff" data-size="188" data-line-cap='butt'>
            <span class="h2 step"><?php echo $training_completion; ?></span>%
            <div class="easypie-text">sessions</div>
          </div>
        </div>                      
      </div>
      <div class="panel-footer"><small>% of completions</small></div>
    </section>
  </div>
</div> -->
<!-- <div class="row">
  <div class="col-lg-4">
    <section class="panel panel-default">
      <header class="panel-heading">Pie</header>
      <div class="panel-body text-center">              
        <div class="sparkline inline" data-type="pie" data-height="150" data-slice-colors="['#99c7ce','#f2f2f2']">60,40</div>
        <div class="line pull-in"></div>
        <div class="text-xs">
          <i class="fa fa-circle text-info"></i> 60%
          <i class="fa fa-circle text-muted"></i> 40%
        </div>
      </div>
    </section>
  </div>
  <div class="col-lg-4">
    <section class="panel panel-default">
      <header class="panel-heading">Composite</header>
      <div class="text-center bg-success lt clearfix">
        <div class="m-t-lg clearfix">
          <div class="sparkline padder m-b" data-type="line" data-resize="true" data-height="50" data-width="100%" data-line-width="2" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="3" values="220,210,200,325,250,320,345,250,250,250,400,380"></div>
          <div class="bg padder">
            <div class="sparkline inline m-t" data-type="bar" data-height="67" data-bar-width="6" data-bar-spacing="10" data-bar-color="#a9d089">5,8,12,10,11,12,8,9,6,7,8,6,10,7</div>
          </div>
        </div>
      </div>
      <footer class="panel-footer text-sm">Check more data</footer>
    </section>
  </div>
  <div class="col-lg-4">
    <section class="panel panel-default">
      <header class="panel-heading">Stacked</header>
      <div class="panel-body text-center">
        <div class="sparkline inline" data-type="bar" data-height="160" data-bar-width="12" data-bar-spacing="10" data-stacked-bar-color="['#afcf6f', '#eee']">5:5,8:4,12:5,10:6,11:7,12:2,8:6,9:3,5:5,4:9</div>
        <ul class="list-inline text-muted axis"><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li></ul>
      </div>
    </section>
  </div>
</div> -->
<!-- <section class="panel panel-default">
  <div class="row m-l-none m-r-none bg-light lter">
    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x text-info"></i>
        <i class="fa fa-users fa-stack-1x text-white"></i>
      </span>
      <a class="clear" href="#">
        <span class="h3 block m-t-xs"><strong><?php echo count($completed_participants).':'.count($planned_participants); ?></strong></span>
        <small class="text-muted text-uc">Attended:Nominated Participants</small>
      </a>
    </div>
    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x text-info"></i>
        <i class="fa fa-user-md fa-stack-1x text-white"></i>
      </span>
      <a class="clear" href="#">
        <span class="h3 block m-t-xs"><strong><?php echo $event_status[1][0]['total'].':'.$event_status[0][0]['total']; ?></strong></span>
        <small class="text-muted text-uc">Completed:Planned Events</small>
      </a>
    </div>
    <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x text-warning"></i>
        <i class="fa fa-tasks fa-stack-1x text-white"></i>
        <span class="easypiechart pos-abt" data-percent="100" data-line-width="4" data-track-Color="#fff" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="2000" data-target="#bugs" data-update="3000"></span>
      </span>
      <a class="clear" href="#">
        <span class="h3 block m-t-xs"><strong id="bugs">468</strong></span>
        <small class="text-muted text-uc">Ongoing Program</small>
      </a>
    </div>
    <div class="col-sm-6 col-md-3 padder-v b-r b-light">                     
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x text-danger"></i>
        <i class="fa fa-file-text-o fa-stack-1x text-white"></i>
        <span class="easypiechart pos-abt" data-percent="100" data-line-width="4" data-track-Color="#f5f5f5" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="3000" data-target="#firers" data-update="5000"></span>
      </span>
      <a class="clear" href="#">
        <span class="h3 block m-t-xs"><strong id="firers">359</strong></span>
        <small class="text-muted text-uc">Completed Program</small>
      </a>
    </div>
    <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
      <span class="fa-stack fa-2x pull-left m-r-sm">
        <i class="fa fa-circle fa-stack-2x icon-muted"></i>
        <i class="fa fa-clock-o fa-stack-1x text-white"></i>
      </span>
      <a class="clear" href="#">
        <span class="h3 block m-t-xs"><strong>32</strong></span>
        <small class="text-muted text-uc">Non Published Program</small>
      </a>
    </div>
  </div>
</section> -->
<!-- <div class="row">
  <div class="col-md-8">
    <section class="panel panel-default">
      <header class="panel-heading font-bold">Statistics</header>
      <div class="panel-body">
        <div id="flot-1ine" style="height:210px"></div>
      </div>
      <footer class="panel-footer bg-white no-padder">
        <div class="row text-center no-gutter">
          <div class="col-xs-3 b-r b-light">
            <span class="h4 font-bold m-t block">5,860</span>
            <small class="text-muted m-b block">Kelana Jaya Line</small>
          </div>
          <div class="col-xs-3 b-r b-light">
            <span class="h4 font-bold m-t block">10,450</span>
            <small class="text-muted m-b block">Ampang Line</small>
          </div>
          <div class="col-xs-3 b-r b-light">
            <span class="h4 font-bold m-t block">21,230</span>
            <small class="text-muted m-b block">MRT</small>
          </div>
          <div class="col-xs-3">
            <span class="h4 font-bold m-t block">7,230</span>
            <small class="text-muted m-b block">Monorail</small>                        
          </div>
        </div>
      </footer>
    </section>
  </div>
  <div class="col-md-4">
    <section class="panel panel-default">
      <header class="panel-heading font-bold">Program Expenses Graph</header>
      <div class="bg-light dk wrapper">
        <span class="pull-right">Friday</span>
        <span class="h4">RM 540.00<br>
          <small class="text-muted">+1.05(2.15%)</small>
        </span>
        <div class="text-center m-b-n m-t-sm">
            <div class="sparkline" data-type="line" data-height="65" data-width="100%" data-line-width="2" data-line-color="#dddddd" data-spot-color="#bbbbbb" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="3" data-resize="true" values="280,320,220,385,450,320,345,250,250,250,400,380"></div>
            <div class="sparkline inline" data-type="bar" data-height="45" data-bar-width="6" data-bar-spacing="6" data-bar-color="#65bd77">10,9,11,10,11,10,12,10,9,10,11,9,8</div>
        </div>
      </div>
      <div class="panel-body">
        <div>
          <span class="text-muted">Total:</span>
          <span class="h3 block">RM 2500.00</span>
        </div>
        <div class="line pull-in"></div>
        <div class="row m-t-sm">
          <div class="col-xs-4">
            <small class="text-muted block">Facilities</small>
            <span>RM 1500.00</span>
          </div>
          <div class="col-xs-4">
            <small class="text-muted block">Subsistance</small>
            <span>RM 600.00</span>
          </div>
          <div class="col-xs-4">
            <small class="text-muted block">Others</small>
            <span>RM 400.00</span>
          </div>
        </div>
      </div>
    </section>
  </div>
</div> -->
<!-- <div class="row">
  <div class="col-md-8">
    <h4 class="m-t-none">Waiting List Training Programs</h4>
    <ul class="list-group gutter list-group-lg list-group-sp sortable">
      <li class="list-group-item box-shadow">
        <a href="#" class="pull-right" data-dismiss="alert">
          <i class="fa fa-times icon-muted"></i>
        </a>
        <span class="pull-left media-xs">
          <i class="fa fa-sort icon-muted fa m-r-sm"></i>
          <a  href="#todo-1" data-toggle="class:text-lt text-success" class="active">
            <i class="fa fa-square-o fa-fw text"></i>
            <i class="fa fa-check-square-o fa-fw text-active text-success"></i>
          </a>
        </span>
        <div class="clear text-success text-lt" id="todo-1">
          GC02 : Basic Electrical Safework & Practice
        </div>
      </li>
      <li class="list-group-item box-shadow">
        <a href="#" class="pull-right" data-dismiss="alert">
          <i class="fa fa-times icon-muted"></i>
        </a>
        <span class="pull-left media-xs">
          <i class="fa fa-sort icon-muted fa m-r-sm"></i>
          <a  href="#todo-2" data-toggle="class:text-lt text-danger">
            <i class="fa fa-square-o fa-fw text"></i>
            <i class="fa fa-check-square-o fa-fw text-active text-danger"></i>
          </a>
        </span>
        <div class="clear" id="todo-2">
          ACC04 : OCC Competency Re-Validation
        </div>
      </li>
      <li class="list-group-item box-shadow">
        <a href="#" class="pull-right" data-dismiss="alert">
          <i class="fa fa-times icon-muted"></i>
        </a>
        <span class="pull-left media-xs">
          <i class="fa fa-sort icon-muted fa m-r-sm"></i>
          <a  href="#todo-3" data-toggle="class:text-lt">
            <i class="fa fa-square-o fa-fw text"></i>
            <i class="fa fa-check-square-o fa-fw text-active text-success"></i>
          </a>
        </span>
        <div class="clear" id="todo-3">
          KFO05 : Vehicle Driver Training 2-Car
        </div>
      </li>
      <li class="list-group-item box-shadow">
        <a href="#" class="pull-right" data-dismiss="alert">
          <i class="fa fa-times icon-muted"></i>
        </a>
        <span class="pull-left media-xs">
          <i class="fa fa-sort icon-muted fa m-r-sm"></i>
          <a  href="#todo-4" data-toggle="class:text-lt">
            <i class="fa fa-square-o fa-fw text"></i>
            <i class="fa fa-check-square-o fa-fw text-active text-success"></i>
          </a>
        </span>
        <div class="clear" id="todo-4">
          ATO05R : Train Driver Competency License Re-Validation
        </div>
      </li>
      <li class="list-group-item box-shadow">
        <a href="#" class="pull-right" data-dismiss="alert">
          <i class="fa fa-times icon-muted"></i>
        </a>
        <span class="pull-left media-xs">
          <i class="fa fa-sort icon-muted fa m-r-sm"></i>
          <a  href="#todo-5" data-toggle="class:text-lt">
            <i class="fa fa-square-o fa-fw text"></i>
            <i class="fa fa-check-square-o fa-fw text-active text-success"></i>
          </a>
        </span>
        <div class="clear" id="todo-5">
          ATN01 : Track Vehicle & Operational Maintenance
        </div>
      </li>
      <li class="list-group-item box-shadow">
        <a href="#" class="pull-right" data-dismiss="alert">
          <i class="fa fa-times icon-muted"></i>
        </a>
        <span class="pull-left media-xs">
          <i class="fa fa-sort icon-muted fa m-r-sm"></i>
          <a  href="#todo-6" data-toggle="class:text-lt">
            <i class="fa fa-square-o fa-fw text"></i>
            <i class="fa fa-check-square-o fa-fw text-active text-success"></i>
          </a>
        </span>
        <div class="clear" id="todo-6">
          AWE02 : Ampang CBTC System Architecture Overview
        </div>
      </li>
    </ul>                  
  </div>
  <div class="col-md-4">
    <section class="panel b-light">
      <header class="panel-heading bg-primary dker no-border"><strong>Calendar</strong></header>
      <div id="calendar" class="bg-primary m-l-n-xxs m-r-n-xxs"></div>
      <div class="list-group">
        <a href="#" class="list-group-item text-ellipsis">
          <span class="badge bg-danger">9:00 AM</span> 
          ARS01 : Introduction to Traction (Training Room 1)
        </a>
        <a href="#" class="list-group-item text-ellipsis"> 
          <span class="badge bg-success">9:00 AM</span> 
          ARS02 : Bogies (Training Room 2)
        </a>
        <a href="#" class="list-group-item text-ellipsis">
          <span class="badge bg-light">9:00 AM</span>
          ARS03 : Suspension System (Training Room 3)
        </a>
      </div>
    </section>                  
  </div>
</div> -->
              