<?php
$uri = $this->uri->segment(1);
$uri1 = $this->uri->segment(2);
$data = is_logged_in();
?>
<section class="header clearfix">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?=base_url();?>">
        <img src="<?=base_url();?>assets/images/logo.png" width="55" height="53">
        Anchorpoint
      </a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="navbar-collapse collapse" id="navbarCollapse" style="">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?=($uri=='home' || $uri=='')?"main-menu-active":"";?>"><a class="nav-link " href="<?=base_url();?>home">Home</a> </li>
          <?php 
          if(!$data)
          {
            ?>
              <li class="nav-item <?=($uri=='login')?"main-menu-active":"";?> ">
                    <a class="nav-link " href="<?=base_url();?>login">Login</a>
              </li>
            <?php
          }
          ?>
          <?php 
          if($data)
          {
            ?>
              <li class="nav-item <?=($uri=='booking' && $uri1=="create")?"main-menu-active":"";?> ">
                <a class="nav-link " href="<?=base_url();?>booking/create">Book a Room</a>
              </li>
              <li class="nav-item <?=($uri=='booking' && $uri1=="logs")?"main-menu-active":"";?>">
                <a class="nav-link" href="<?=base_url();?>booking/logs">Booking Log</a>
              </li>
              <li class="nav-item <?=($uri=='room' && $uri1=="status")?"main-menu-active":"";?>">
                <a class="nav-link " href="<?=base_url();?>room/status">Room Status</a>
              </li>
              <li class="nav-item <?=($uri=='feedback')?"main-menu-active":"";?>">
                 <a class="nav-link " href="<?=base_url();?>feedback">All Feedback</a> </li>
              <li class="nav-item logout-btn"> <a class="nav-link " href="<?=base_url();?>login/logout"> Logout</a></li>
              <?php
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</section>