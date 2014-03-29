<div id="main-header">
  <div class="wrapper clearfix">
    <a href="<?= site_url('pages/home'); ?>" id="logo"><span>Department of</span>Computer Science</a>
    <!--
    <nav>
      <a href="<?= site_url('info/department'); ?>" class="<?= current_header_item($controller, $action, 'info'); ?>">Info</a>
      <a href="<?= site_url('calendar/index'); ?>" class="<?= current_header_item($controller, $action, 'calendar'); ?>">Calendar</a>
      <a href="#" class="<?= current_header_item($controller, $action, 'projects'); ?>">Projects</a>
      <a href="<?= site_url('news/index'); ?>" class="<?= current_header_item($controller, $action, 'news'); ?>">News</a>
      <a href="#" class="<?= current_header_item($controller, $action, 'events'); ?>">Events</a>
      <a href="#" class="<?= current_header_item($controller, $action, 'contact'); ?>">Contact Us</a>
    </nav>
    -->
    <?php $user_info = $this->session->userdata('user_info'); ?>    
    <?php if ($this->session->userdata('user_id') && $user_info != null) : ?>
      <a href="<?=site_url('users/profile')?>" id="current-user">
        <div class="image" style="background-image: url('<?=base_url().$user_info->profpic?>')"></div>
        <div class="content">
          <h2><?=($user_info->firstname != null && $user_info->lastname != null) ? $user_info->firstname." ".$user_info->lastname : "ACSG";?></h2>
          <p><? if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 0) :
                  echo 'Student';
                elseif($this->session->userdata('role') == 2) :
                  echo 'Faculty';
                else :
                  echo 'Administrator';
                endif;
              ?></p>
        </div>
      </a>
    <?php endif; ?>
  </div>
</div>