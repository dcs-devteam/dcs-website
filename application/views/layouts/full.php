<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('partials/head'); ?>
  <title>{page_title}</title>
</head>

<body class="<?= body_classes($controller, $action); ?>">
  <div id="main-wrapper" class="full">
    <?php $this->load->view('partials/header'); ?>
    <div id="main-content">{main_content}</div>
  </div>
  <?php $this->load->view('partials/footer'); ?>
</body>
</html>