<div id="main-header">
  <div class="wrapper clearfix">
    <a href="<?= site_url('pages/home'); ?>"><span>Department of</span>Computer Science</a>
    <nav>
      <a href="<?= site_url('info/department'); ?>" class="<?= current_header_item($controller, $action, 'info'); ?>">Info</a>
      <!--
      <a href="#" class="<?= current_header_item($controller, $action, 'projects'); ?>">Projects</a>
      <a href="<?= site_url('news/index'); ?>" class="<?= current_header_item($controller, $action, 'news'); ?>">News</a>
      <a href="#" class="<?= current_header_item($controller, $action, 'events'); ?>">Events</a>
      <a href="<?= site_url('calendar/index'); ?>" class="<?= current_header_item($controller, $action, 'calendar'); ?>">Calendar</a>
      <a href="#" class="<?= current_header_item($controller, $action, 'contact'); ?>">Contact Us</a>
      -->
    </nav>

    <div class="logos">
      <img src="<?= base_url() . 'assets/images/up-logo.png'; ?>" />
    </div>
  </div>
</div>