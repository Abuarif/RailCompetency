<section class="vbox">
  <?php 
    if (!empty($this->Session->read('Auth.User.Role.title'))) {
        $title = $this->Session->read('Auth.User.Role.title');
    } else {
        $title = $this->Session->read('Auth.User.Role.0.Role.title');
    }

    $full_name = $this->Session->read('Auth.User.name');
    $find_name = explode(' ',$full_name);
    $first_name = $find_name[0];
  ?>
  <header class="header bg-white b-b b-light">
    <p style="font-size:17px;">Welcome!</p>
  </header>
  <section class="scrollable">
      <section class="hbox stretch">
          <aside class="aside-lg bg-light lter b-r">
              <section class="vbox">
                  <section class="scrollable">
                      <div class="wrapper">
                          <div class="clearfix m-b">
                              <a href="#" class="pull-left thumb m-r">
                                  <!-- <img src="images/avatar.jpg" class="img-circle"> -->
                                  <?php
                                    if (!empty($this->Session->read('Auth.User.image'))) 
                                    {
                                      $myImg = 'profiles/'.$this->Session->read('Auth.User.image'); 
                                  ?>
                                      <img src="<?php echo Router::url('/').$myImg?>" style="height:60px;width:60px;" class="img-circle">
                                  <?php } else if (!empty($this->Session->read('Auth.User.photo'))) {
                                      $myImg = $this->Session->read('Auth.User.photo'); ?>
                                      <img src="data:image/jpeg;base64,<?php echo $myImg; ?>" style="height:60px;width:60px;" class="img-circle">
                                  <?php } else { ?>
                                      <img src="<?php echo Router::url('/').'../theme/LamanPuteri/images/avatar.jpg';?>" style="height:60px;width:60px;" class="img-circle">
                                  <?php } ?>
                              </a>
                              <div class="clear">
                                  <div class="h3 m-t-xs m-b-xs"><?php echo $first_name;?></div>
                                  <small class="text-muted"><i class="fa fa-map-marker"></i> Kuala Lumpur</small>
                              </div>
                          </div>
                          <div class="panel wrapper panel-success">
                              <div class="row">
                                  <div class="col-xs-4">
                                      <a href="#">
                                          <?php
                                            if(!empty($myTotalEvent))
                                            {
                                              $event = $myTotalEvent;
                                            }
                                            else
                                            {
                                              $event = '0';
                                            }

                                            if(!empty($planned_participants))
                                            {
                                              $participants = $planned_participants;
                                            }
                                            else
                                            {
                                              $participants = '0';
                                            }

                                            if(!empty($myMemoEvent))
                                            {
                                              $memo = $myMemoEvent;
                                            }
                                            else
                                            {
                                              $memo = '0';
                                            }
                                          ?>
                                          <span class="m-b-xs h4 block"><?php echo $event; ?></span>
                                          <small class="text-muted">Events</small>
                                      </a>
                                  </div>
                                  <div class="col-xs-4">
                                      <a href="#">
                                          <span class="m-b-xs h4 block"><?php echo $participants; ?></span>
                                          <small class="text-muted">Nominate</small>
                                      </a>
                                  </div>
                                  <div class="col-xs-4">
                                      <a href="#">
                                          <span class="m-b-xs h4 block"><?php echo $memo; ?></span>
                                          <small class="text-muted">Memo</small>
                                      </a>
                                  </div>
                              </div>
                          </div>
                          <div>
                              <small class="text-uc text-xs text-muted">role</small>
                              <p><a href="#" class="btn btn-xs btn-info m-t-xs"><?php echo $title; ?></a></p>
                              <small class="text-uc text-xs text-muted">info</small>
                              <p>Rail Competency Management System (RCMS) was developed since 2015 and launched at 2016. The system is to manage the training that was conducted by Rail Academy from Rapid Rail Sdn Bhd.</p>
                              <div class="line"></div>
                              <small class="text-uc text-xs text-muted">connection</small>
                              <p class="m-t-sm">
                                  <a href="https://twitter.com/myrapidkl?lang=en" class="btn btn-rounded btn-twitter btn-icon" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                  </a>
                                  <a href="https://www.facebook.com/myrapid/" class="btn btn-rounded btn-facebook btn-icon" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                  </a>
                                  <a href="https://www.google.com.my/search?sxsrf=ALeKk01g0SCVZ6squ2uNxoingiIBwipgeg%3A1583218584401&source=hp&ei=mP9dXo6qFouZ4-EP88SLqAs&q=myrapid&oq=myrapid&gs_l=psy-ab.3..35i39l3j0j0i20i263l2j0l4.1107.2471..2675...1.0..0.114.478.6j1......0....1..gws-wiz.......0i131j0i67.LkIIEmnZohk&ved=0ahUKEwiO1srq3P3nAhWLzDgGHXPiArUQ4dUDCAY&uact=5" class="btn btn-rounded btn-gplus btn-icon" target="_blank">
                                    <i class="fa fa-google-plus"></i>
                                  </a>
                              </p>
                          </div>
                      </div>
                  </section>
              </section>
          </aside>
          <aside class="bg-white">
              <section class="vbox">
                  <header class="header bg-light bg-gradient">
                      <ul class="nav nav-tabs nav-white">
                          <li class="active"><a href="#activity" data-toggle="tab">Activities</a></li>
                      </ul>
                  </header>
                  <section class="scrollable">
                      <div class="tab-content">
                          <div class="tab-pane active" id="activity">
                              <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                                  <?php foreach($event_list as $event) { ?>
                                  <li class="list-group-item">
                                      <a href="#" class="thumb-sm pull-left m-r-sm">
                                          <img src="<?php echo Router::url('/').'theme/LamanPuteri/images/icons_memo.png';?>" class="img-circle">
                                      </a>
                                      <a href="#" class="clear">
                                          <small class="pull-right"><strong><?php echo $event['Event']['status']; ?></strong></small>
                                          <strong class="block"><?php echo $event['Event']['details']; ?></strong>
                                          <span class="label bg-danger"><?php echo $event['Event']['event_type'] ?></span><br/>
                                          <small><?php echo $event['Event']['start_date'] . ' - ' .  $event['Event']['end_date']; ?></small>
                                      </a>
                                  </li>
                                  <?php } ?>
                              </ul>
                          </div>
                      </div>
                  </section>
              </section>
          </aside>
          <aside class="col-lg-4 b-l">
              <section class="vbox">
                  <section class="scrollable">
                      <div class="wrapper">
                          <section class="panel panel-default">
                              <header class="panel-heading bg-primary dker no-border"><strong>Calendar</strong></header>
                              <div id="calendar" class="bg-primary m-l-n-xxs m-r-n-xxs"></div>
                          </section>
                          <section class="panel panel-default">
                              <h4 class="font-thin padder">Latest Memo</h4>
                              <ul class="list-group">
                                  <?php foreach($memo_list as $memo) { ?>
                                  <li class="list-group-item">
                                      <p>
                                        <?php echo 'Memo with subject <a href="#" class="text-info">' . $memo['Event']['details'] . '</a> for ' . $memo['Event']['event_type'] . ' was ' . $memo['Event']['status'] . ' recently.' ?>
                                      </p>
                                      <small class="block text-muted">
                                        <i class="fa fa-clock-o"></i> <?php echo $memo['Event']['modified'] ?>
                                      </small>
                                  </li>
                                  <?php } ?>
                              </ul>
                          </section>
                      </div>
                  </section>
              </section>
          </aside>
      </section>
  </section>
</section>