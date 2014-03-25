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

    <a id="current-user">
      <div class="image" style="background-image: url('<?= base_url() . 'assets/images/profile-picture.jpg'; ?>')"></div>
      <div class="content">
        <h2>Arnelle Balane</h2>
        <p>Student</p>
      </div>
    </a>
  </div>
</div>