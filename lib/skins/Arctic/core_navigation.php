<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"><?php echo SITE_NAME; ?></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="<?php echo url(''); ?>">Home</a></li>
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Corporate<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo url('/pages/about'); ?>">About us</a></li>
          <li><a href="<?php echo url('/pages/staff'); ?>">Staff</a></li>
         
       
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Operations<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo url('/schedules'); ?>">Schedules</a></li>
          <li><a href="<?php echo url('/schedule/bids'); ?>">Bookings</a></li>
          <li><a href="<?php echo url('/pireps/filepirep'); ?>">File Pirep</a></li>
          <li><a href="<?php echo url('/acars'); ?>">Live Flights</a></li>
          <li class="divider"></li>
	<li><a href="<?php echo url('/pilots'); ?>">Pilot Roster</a></li>
       
        </ul>
      </li>
    </ul>
  
    <ul class="nav navbar-nav navbar-right">
    <?php
    if(Auth::LoggedIn() == false){
    ?>
      <li><a href="<?php echo url('/login'); ?>">Login</a></li>
      <li><a href="<?php echo url('/registration'); ?>">Register</a></li>
     
      <?php
      }else{
      ?>
       <li><a href="<?php echo url('/logout'); ?>">Logout</a></li>
   
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown">Pilot Center <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo url('/profile'); ?>">Profile</a></li>
          <li><a href="<?php echo url('/downloads'); ?>">Downloads</a></li>
          <li><a href="<?php echo url('/training'); ?>">Training</a></li>
    
        </ul>
      </li>
      <?php
      }
      ?>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>