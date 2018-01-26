          <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><?php echo __('Staff Assignment'); ?> Calendar</li>
          </ul>
          <div class="m-b-md">
            <h3 class="m-b-none"><?php echo __('Staff Assignment'); ?> Calendar</h3>
          </div>
          <!-- start content view page -->
          <section class="vbox">
            <section class="scrollable">
              <section class="hbox stretch">          
            <!-- .aside -->
            <aside>
              <section class="vbox">
                <section class="scrollable wrapper">
                  <section class="panel panel-default">
                    <header class="panel-heading bg-light clearfix">
                      <div class="btn-group pull-right" data-toggle="buttons">
                        <label class="btn btn-sm btn-bg btn-default" id="refresh" onclick ='location.reload();'>
                          <input type="radio" name="options"><i class="fa fa-refresh"></i>
                        </label>
                        <label class="btn btn-sm btn-bg btn-default active" id="monthview">
                          <input type="radio" name="options">Month
                        </label>
                        <label class="btn btn-sm btn-bg btn-default" id="weekview">
                          <input type="radio" name="options">Week
                        </label>
                        <label class="btn btn-sm btn-bg btn-default" id="dayview">
                          <input type="radio" name="options">Day
                        </label>
                      </div>
                      <span class="m-t-xs inline">
                        Fullcalendar
                      </span>
                    </header>
                    <div class="calendar" id="calendar">

                    </div>
                  </section>
                </section>
              </section>
            </aside>
            <!-- /.aside -->
            <!-- .aside -->
            <aside class="aside-lg b-l">
              <div class="padder">
                <h5>Dragable <?php echo __('Staff Assignment'); ?></h5>
                <div class="line"></div>
                <div id="myEvents" class="pillbox clearfix m-b no-border no-padder">
                  <ul>
                    <li class="label bg-dark">Item One</li>
                    <li class="label bg-success">Item Two</li>
                    <li class="label bg-warning">Item Three</li>
                    <li class="label bg-danger">Item Four</li>
                    <li class="label bg-info">Item Five</li>
                    <li class="label bg-primary">Item Six</li>
                    <input type="text" placeholder="add an event">
                  </ul>
                </div>
                <div class="line"></div>
                <div class="checkbox">
                  <label class="checkbox-custom"><input type='checkbox' id='drop-remove' /><i class="fa fa-square-o"></i> remove after drop</label>
                </div>
              </div>
            </aside>
            <!-- /.aside -->
          </section>
        </section>
      </section>