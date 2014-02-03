<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <title>{page_title}</title>
</head>

<body class="<?= body_classes($controller, $action); ?>">
  <div id="main-wrapper">
    <?php $this->load->view('partials/header'); ?>
    <div class="wrapper">
      <aside id="main-sidebar"><?php $this->load->view('partials/sidebar'); ?></aside>
      <div id="main-content">{main_content}</div>
    </div>
  </div>
  <?php $this->load->view('partials/footer'); ?>
</body>
</html>