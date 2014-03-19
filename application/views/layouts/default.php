<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <title>{page_title}</title>
</head>

<body class="<?= body_classes($controller, $action); ?>">
  <div id="main-wrapper" class="default">    
    <p class="notification notice">Success Message</p>        
    <p class="notification alert">Error Message</p>    
    <?php $this->load->view('partials/header'); ?>
    <div class="wrapper clearfix">
      <aside id="main-sidebar">{sidebar_content}</aside>
      <div id="main-content">{main_content}</div>
    </div>
  </div>
  <?php $this->load->view('partials/footer'); ?>
</body>
</html>