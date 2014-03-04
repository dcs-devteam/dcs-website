<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <title>Calendar | Department Of Computer Science</title>
</head>

<body class="<?= body_classes($controller, $action); ?>">
  <div id="main-wrapper">
    <?php $this->load->view('partials/header'); ?>
    <div class="wrapper clearfix">
      <div id="main-content">
        <iframe src="https://www.google.com/calendar/embed?showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=7kc4vluuqs77ue8onf291kgn68%40group.calendar.google.com&amp;color=%23333333&amp;ctz=Asia%2FManila" style=" border-width:0 " width="100%" height="800" frameborder="0" scrolling="no"></iframe>
      </div>
    </div>
  </div>
  <?php $this->load->view('partials/footer'); ?>
</body>
</html>