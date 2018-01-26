        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="<?php echo $this->webroot.'profiles/'.$this->Session->read('Auth.User.image');?>">
            </span>
            <?php echo $this->Session->read('Auth.User.name');?><b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">
            <span class="arrow top"></span>
            <li>
              <a href="<?php echo $this->webroot.'admin'; ?>">Settings</a>
            </li>
            <li>
              <a href="<?php echo $this->webroot.'admin/user_edit'; ?>">Profile</a>
            </li>
            <li>
              <a href="#">
                <span class="badge bg-danger pull-right">3</span>
                Notifications
              </a>
            </li>
            <li>
              <a href="docs.html">Help</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="<?php echo $this->webroot.'users/users/logout'; ?>">Logout</a>
            </li>
          </ul>
        </li>